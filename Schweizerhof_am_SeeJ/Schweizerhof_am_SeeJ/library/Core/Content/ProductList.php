<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Router\Route;

class CoreContentProductList
{
    private $_component;
    public function __construct($component) {
        $this->_component = $component;
    }

    public function getProducts() {
        $isFeaturedProducts = vRequest::getInt('featured', '0');
        if ($isFeaturedProducts === '1') {
            $productModel = VmModel::getModel('Product');
            $productModel::$omitLoaded = false;
            $items = $productModel->getProductListing(
                'featured',
                25,
                true,
                true,
                false,
                false,
                '0',
                false,
                null,
            );
            $this->_component->products = array('products' => $items);
        }

        if (count($this->_component->products) > 0 && array_key_exists(0, $this->_component->products)) {
            $p = $this->_component->products;
            $this->_component->products = array();
            $this->_component->products[0] = $p;
        }

        if (!function_exists('filterCollections')) {
            function filterCollections($collection)
            {
                return count($collection) > 0;
            }
        }

        return array_filter(
            $this->_component->products,
            function ($collection) {
                return count($collection) > 0;
            }
        );
    }

    public function getVmSortingFilter() {
        return !empty($this->_component->orderByList) && isset($this->_component->orderByList['orderby']) ?
            $this->_component->orderByList['orderby'] :
            '';
    }

    public function getVmCategories()
    {
        $cats = array();
        $currentCat = null;
        if ($this->_component->categoryId !== '0') {
            $backCat = new stdClass();
            $backCat->virtuemart_category_id = $this->_component->category->category_parent_id;
            $backCat->category_name = '< Back';
            array_push($cats, $backCat);

            $currentCat = new stdClass();
            $currentCat->virtuemart_category_id = $this->_component->categoryId;
            $currentCat->category_name = $this->_component->category->category_name;
            $currentCat->active = true;
            $currentCat->children = [];
            array_push($cats, $currentCat);
        }

        $children = VirtueMartModelCategory::getChildCategoryListObject(1, $this->_component->categoryId);
        foreach ($children as $child) {
            if ($currentCat && property_exists($currentCat, 'children')) {
                array_push($currentCat->children, $child);
            } else {
                array_push($cats, $child);
            }
        }

        return $cats;
    }

    public function getVmCategoriesFilter() {
        $vmCats = array();
        if (!empty($this->_component->category)) {
            $vmCats = $this->createVmCategoriesFilter();
        }
        return $vmCats;
    }
    public function createVmCategoriesFilter() {
        $allCategories = array();
        $model = VmModel::getModel('category');
        $categories = $model->getCategoryTree('', 0, false, '', '', '', false, '');
        foreach ($categories as $category) {
            array_push(
                $allCategories,
                array(
                    'categoryId' => $category->category_parent_id ?: null,
                    'id' => (string) $category->virtuemart_category_id,
                    'title' => $category->category_name,
                )
            );
        }
        $categories = self::buildTreeCategories($allCategories);

        return $categories;
    }

    public static function buildTreeCategories($categories, $parentId = 0)
    {
        $isFeaturedProducts = vRequest::getInt('featured', '0');
        $catId = vRequest::getInt('virtuemart_category_id', '0');
        $result = array();
        if ($parentId === 0) {
            $item = new \stdClass();
            $item->title = 'All';
            $item->id = 'all';
            $item->active = false;
            $item->link = Route::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id=0');
            $item->children = array();
            if ($catId === '0' && $isFeaturedProducts === '0') {
                $item->selected = true;
            }
            array_push($result, $item);
        }
        if ($parentId === 0) {
            $item = new \stdClass();
            $item->title = 'Featured';
            $item->id = 'featured';
            $item->active = false;
            $item->link = Route::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id=0&&featured=1');
            $item->children = array();
            if ($catId === '0' && $isFeaturedProducts === '1') {
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
            $item->link = Route::_('index.php?option=com_virtuemart&view=category&virtuemart_category_id=' . $category['id']);
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
