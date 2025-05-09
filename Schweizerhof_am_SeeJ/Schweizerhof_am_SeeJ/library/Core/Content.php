<?php
defined('_JEXEC') or die;

use Joomla\CMS\Categories\Categories;
use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;
use Joomla\Registry\Registry;

/**
 * Contains the article factory method and content component rendering helpers.
 */
Core::load("Core_Content_ArchivedArticle");
Core::load("Core_Content_SingleArticle");
Core::load("Core_Content_CategoryArticle");
Core::load("Core_Content_FeaturedArticle");
Core::load("Core_Content_ProductDetails");
Core::load("Core_Content_ProductList");
Core::load("Core_Content_ShoppingCart");
Core::load("Core_Content_Checkout");

class CoreContent
{
    protected $_component;
    protected $_componentParams;

    public $pageClassSfx;

    public $pageHeading;

    public function __construct($component, $params = null)
    {
        $this->_component = $component;
        $this->_componentParams = $params;

        $className = strtolower(get_class($component));
        if (strpos($className, 'virtuemart') === false) {
            $this->pageClassSfx = $component->get('pageclass_sfx');
            $this->pageHeading = $this->_componentParams->get('show_page_heading', 1)
                ? $this->_componentParams->get('page_heading') : '';
        }
    }

    public function pageHeading($title = null)
    {
        $heading = '';
        if (strlen($this->pageHeading)) {
            ob_start();
            echo '<section class="u-clearfix"><div class="u-clearfix u-sheet"><h1>';
            echo $this->pageHeading;
            echo '</h1></div></section>';
            $heading = ob_get_clean();
        }
        return $heading;
    }

    public function article($view, $article, $params, $properties = array())
    {
        switch ($view) {
            case 'archive':
                return new CoreContentArchivedArticle($this->_component, $this->_componentParams,
                    $article, $params);
            case 'article':
                return new CoreContentSingleArticle($this->_component, $this->_componentParams,
                    $article, $params, $properties);
            case 'category':
                return new CoreContentCategoryArticle($this->_component, $this->_componentParams,
                    $article, $params);
            case 'featured':
                return new CoreContentFeaturedArticle($this->_component, $this->_componentParams,
                    $article, $params);
        }
    }

    public function product($view, $product) {
        switch ($view) {
            case 'productdetails':
                return new CoreContentProductDetails($this->_component, $this->_componentParams, $product);
        }
    }

    public function getProductsBuilder() {
        return new CoreContentProductList($this->_component);
    }

    public function cart($cart) {
        return new CoreContentShoppingCart($this->_component, $this->_componentParams, $cart);
    }

    public function checkout() {
        return new CoreContentCheckout($this->_component, $this->_componentParams);
    }

    public function beginPageContainer($class, $attrs = array())
    {
        $str = '';
        foreach($attrs as $name => $value) {
            $str .= ' ' . $name . (!is_null($value) ? ('="' . $value . '"') : '');
        }
        return '<div class="' . $class . $this->pageClassSfx .'"' . $str . '>';
    }

    public function endPageContainer()
    {
        return '</div>';
    }

    public function getCategories($parentId, $category)
    {
        $cats = array();
        $params = new Registry();
        $params->loadArray(array(
            'parent' => 'root',
            'show_description' => '0',
            'numitems' => '0',
            'show_children' => '1',
            'count' => '1',
            'maxlevel' => '0',
            'layout' => '_:default',
            'item_heading' => '4',
            'moduleclass_sfx' => '',
            'owncache' => '1',
            'cache_time' => '900',
            'module_tag' => 'div',
            'header_tag' => 'h3',
            'header_class' => '',
            'style' => '0',
        ));

        $options = array();
        $options['countItems'] = $params->get('numitems', 0);

        if ($parentId !== 'root') {
            $backCat = new stdClass();
            $backCat->id = $parentId;
            $backCat->title = '< Back';
            array_push($cats, $backCat);
        } else {
            $categories = Categories::getInstance('Content', $options);
            $parentCategory   = $categories->get($parentId, true);
            if ($parentCategory !== null)
            {
                $children = $parentCategory->getChildren();
                foreach ($children as $child) {
                    if ($child->id === $category->id) {
                        continue;
                    }
                    array_push($cats, $child);
                }
            }
        }

        $currentCat = new stdClass();
        $currentCat->id = $category->id;
        $currentCat->title = $category->title;
        $currentCat->active = true;
        $currentCat->children = [];
        array_push($cats, $currentCat);

        $categories = Categories::getInstance('Content', $options);
        $category   = $categories->get($category->id, true);

        if ($category !== null)
        {
            $children = $category->getChildren();
            foreach ($children as $child) {
                array_push($currentCat->children, $child);
            }
        }
        return $cats;
    }

    public function getCategoriesFilter() {
        $cats = array();
        $categories = Categories::getInstance('Content', array());
        $parentCategory   = $categories->get('root', true);
        if ($parentCategory !== null)
        {
            $children = $parentCategory->getChildren(true);
            foreach ($children as $child) {
                array_push(
                    $cats,
                    array(
                        'categoryId' => $child->parent_id !== 'root' ? $child->parent_id : null,
                        'id' => (string) $child->id,
                        'title' => $child->title,
                    ),
                );
            }
        }
        return self::buildTreeCategories($cats);
    }

    public static function buildTreeCategories($categories, $parentId = 0)
    {
        $input = Factory::getApplication()->input;
        $view = $input->get('view', 'category');
        $catId = $input->get('id', 'blog');
        $result = array();
        if ($parentId === 0) {
            $item = new \stdClass();
            $item->title = 'Featured';
            $item->id = 'featured';
            $item->active = false;
            $item->link = Route::_('index.php?option=com_content&view=featured');
            $item->children = array();
            if ($view === 'featured') {
                $item->selected = true;
            }
            array_push($result, $item);
        }
        foreach ($categories as $category) {
            $categoryId = $category['categoryId'];
            if (!$parentId && $categoryId) {
                continue;
            }
            if ($parentId && $parentId != $categoryId) {
                continue;
            }
            $item = new \stdClass();
            $item->id = $category['id'];
            $item->title = $category['title'];
            $item->link = Route::_('index.php?option=com_content&view=category&layout=blog&id=' . $category['id']);
            $item->active = false;
            $item->children = self::buildTreeCategories($categories, $category['id']);
            if ($catId === $category['id']) {
                $item->selected = true;
            }
            array_push($result, $item);
        }
        return $result;
    }
}
