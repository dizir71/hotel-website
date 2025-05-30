<?php
defined('_JEXEC') or die;

use Joomla\CMS\Router\Route;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Site\Helper\RouteHelper;

Core::load("Core_Content_Item");

class CoreContentSingleArticle extends CoreContentItem
{
    public $print;

    public $toc;

    public $intro;

    public $text;

    public $tags = array();

    public $pageHeading;

    public $paginationPosition;

    public $showLinks;

    public function __construct($component, $componentParams, $article, $articleParams, $properties)
    {
        parent::__construct($component, $componentParams, $article, $articleParams);
        $this->print = isset($properties['print']) ? $properties['print'] : '';
        $this->pageHeading = $this->_componentParams->get('show_page_heading', 0)
            ? $this->_componentParams->get('page_heading') : '';
        $this->titleLink = $this->_articleParams->get('link_titles') && !empty($this->_article->readmore_link)
            ? $this->_article->readmore_link : '';
        $this->shareLink = dirname(Uri::current()) . '/' . RouteHelper::getArticleRoute($this->_article->slug, $this->_article->catid);
        $this->emailIconVisible = $this->emailIconVisible && !$this->print;
        $this->editIconVisible = $this->editIconVisible && !$this->print;
        $this->category = $this->_articleParams->get('show_category') ? $this->_article->category_title : '';
        $this->categoryLink = $this->_articleParams->get('link_category') && $this->_article->catid
            ? Route::_(RouteHelper::getCategoryRoute($this->_article->catid))
            : '';
        $this->parentCategory = $this->_articleParams->get('show_parent_category') && !empty($this->_article->parent_id)
            ? $this->_article->parent_title : '';
        $this->parentCategoryLink = $this->_articleParams->get('link_parent_category') && !empty($this->_article->parent_id)
            ? Route::_(RouteHelper::getCategoryRoute($this->_article->parent_id))
            : '';

        $this->author = $this->_articleParams->get('show_author') && !empty($this->_article->author)
            ? ($this->_article->created_by_alias ? $this->_article->created_by_alias : $this->_article->author)
            : '';
        if (strlen($this->author) && $this->_articleParams->get('link_author')  && !empty($this->_article->contactid)) {
            $needle = 'index.php?option=com_contact&view=contact&id=' . $this->_article->contactid;
            $menu = Factory::getApplication()->getMenu();
            $item = $menu->getItems('link', $needle, true);
            $this->authorLink = !empty($item) ? $needle . '&Itemid=' . $item->id : $needle;
        } else
            $this->authorLink = '';

        if ($this->_articleParams->get('show_tags', 1) && !empty($this->_article->tags)) {
            $this->_article->tagLayout = new JLayoutFile('joomla.content.tags');
            $tagsContent = $this->_article->tagLayout->render($this->_article->tags->itemTags);
            if (preg_match_all('/<a[^>]+>[\s\S]+?<\/a>/', $tagsContent, $matches, PREG_SET_ORDER)) {
                foreach ($matches as $match) {
                    array_push($this->tags, $match[0]);
                }
            }
        }

        $this->toc = isset($this->_article->toc) ? $this->_article->toc : '';
        $this->text = $this->_articleParams->get('access-view') ? $this->_article->text : '';
        $user = Factory::getUser();
        $this->introVisible = !$this->_articleParams->get('access-view') && $this->_articleParams->get('show_noauth') && $user->get('guest');
        $this->intro = $this->_article->introtext;
        if (!$this->_articleParams->get('access-view') && $this->_articleParams->get('show_noauth') && $user->get('guest')
            && $this->_articleParams->get('show_readmore') && $this->_article->fulltext != null)
        {
            $attribs = json_decode($this->_article->attribs);
            if ($attribs->alternative_readmore == null) {
                $this->readmore = Text::_('JGLOBAL_REGISTER_TO_READ_MORE');
            } elseif ($this->readmore = $this->_article->alternative_readmore) {
                if ($this->_articleParams->get('show_readmore_title', 0) != 0)
                    $this->readmore .= HTMLHelper::_('string.truncate', ($this->_article->title), $this->_articleParams->get('readmore_limit'));
            } elseif ($this->_articleParams->get('show_readmore_title', 0) == 0) {
                $this->readmore = Text::_('JGLOBAL_READ_MORE');
            } else {
                $this->readmore = Text::sprintf('JGLOBAL_READ_MORE_TITLE')
                    . HTMLHelper::_('string.truncate', $this->_article->title,
                        $this->_articleParams->get('readmore_limit'));
            }
            $link = new Uri(Route::_('index.php?option=com_users&view=login'));
            $this->readmoreLink = $link->__toString();
        } else {
            $this->readmore = '';
            $this->readmoreLink = '';
        }
        $this->paginationPosition = (isset($this->_article->pagination) && $this->_article->pagination && isset($this->_article->paginationposition))
            ? (($this->_article->paginationposition ? 'below' : 'above') . ' ' . ($this->_article->paginationrelative ? 'full article' : 'text'))
            : '';
        $this->showLinks = isset($this->_article->urls) && is_string($this->_article->urls) && !empty($this->_article->urls);
    }

    public function printIcon()
    {
        $text =  HTMLHelper::_($this->print ? 'icon.print_screen' : 'icon.print_popup', $this->_article, $this->_articleParams);
        if ($this->showIcons && version_compare(JVERSION, '3.0.0') >= 0) {
            $src = Uri::root(true) . '/templates/' . Factory::getApplication()->getTemplate();
            preg_match('/<a[^>]*>(.*?)<\/a>/', $text, $matches);
            $linkContent = $matches[1];
            $newLinkContent = '<img src="' . $src . '/images/system/printButton.png" alt="Print" />';
            $text = str_replace($linkContent, $newLinkContent, $text);
        }
        return $text;
    }

    public function toc($toc)
    {
        return $toc;
    }

    public function intro($intro)
    {
        return $intro;
    }

    public function text($text)
    {
        return $text;
    }

    public function pagination() {
        $count = preg_match_all('/<a[^>]*>[\s\S]*?<\/a>/', $this->_article->pagination, $matches);
        $content = '';
        if (false !== $count  && $count > 0){
            $content = '<div>';
            foreach($matches[0] as $value){
                $content .= $value;
            }
            $content .= '</div>';
        }
        return $content ? $content : $this->_article->pagination;
    }
}
