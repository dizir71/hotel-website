<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

$document = Factory::getApplication()->getDocument();

$blogStyles = <<<STYLES
<style>
 .u-section-1 {
  background-image: linear-gradient(#73a3de, #f0f5fc);
}
.u-section-1 .u-sheet-1 {
  min-height: 811px;
}
.u-section-1 .u-text-1 {
  margin: 20px 0 0;
}
.u-section-1 .u-blog-1 {
  margin-top: 6px;
  margin-bottom: 60px;
  min-height: 433px;
  grid-template-columns: calc(33.3333% - 14.6667px) calc(33.3333% - 14.6667px) calc(33.3333% - 14.6667px);
  height: auto;
  grid-gap: 22px 22px;
}
.u-section-1 .u-repeater-1 {
  grid-template-columns: repeat(3, calc(33.333333333333336% - 14.6667px));
  grid-gap: 22px;
}
.u-section-1 .u-container-layout-1 {
  padding: 30px 19px;
}
.u-section-1 .u-image-1 {
  width: 284px;
  height: 228px;
  margin: 0 auto 0 0;
}
.u-section-1 .u-group-1 {
  width: 259px;
  min-height: 204px;
  background-size: auto;
  margin: -49px 1px 0 auto;
}
.u-section-1 .u-container-layout-2 {
  padding: 20px 15px;
}
.u-section-1 .u-text-2 {
  border-style: none none solid;
  margin: 0;
  padding: 0;
}
.u-section-1 .u-text-3 {
  border-style: none none solid;
  margin: 6px 0 0;
  padding: 0;
}
.u-section-1 .u-btn-1 {
  margin: 30px auto 0;
}
.u-section-1 .u-container-layout-3 {
  padding: 30px 19px;
}
.u-section-1 .u-image-2 {
  height: 228px;
  width: 284px;
  margin: 0 auto 0 0;
}
.u-section-1 .u-group-2 {
  width: 259px;
  min-height: 204px;
  background-size: auto;
  margin: -49px 1px 0 auto;
}
.u-section-1 .u-container-layout-4 {
  padding: 20px 15px;
}
.u-section-1 .u-text-4 {
  margin: 0;
}
.u-section-1 .u-text-5 {
  margin: 6px 0 0;
}
.u-section-1 .u-btn-2 {
  margin: 20px 0 0;
}
.u-section-1 .u-repeater-item-3 {
  background-size: auto;
}
.u-section-1 .u-container-layout-5 {
  padding: 30px 19px;
}
.u-section-1 .u-image-3 {
  width: 284px;
  height: 228px;
  margin: 0 auto 0 0;
}
.u-section-1 .u-group-3 {
  width: 259px;
  min-height: 204px;
  margin: -49px 1px 0 auto;
}
.u-section-1 .u-container-layout-6 {
  padding: 20px 15px;
}
.u-section-1 .u-text-6 {
  margin: 0;
}
.u-section-1 .u-text-7 {
  border-style: none none solid;
  margin: 6px 0 0;
  padding: 0;
}
.u-section-1 .u-text-1 {
  margin: 20px 0 0;
}
.u-section-1 .u-gallery-nav-1 {
  position: absolute;
  left: 10px;
  width: 40px;
  height: 40px;
}
.u-section-1 .u-gallery-nav-2 {
  position: absolute;
  right: 10px;
  width: 40px;
  height: 40px;
}
@media (max-width: 1199px) {
  .u-section-1 .u-sheet-1 {
    min-height: 552px;
  }
  .u-section-1 .u-image-1 {
    width: 234px;
  }
  .u-section-1 .u-group-1 {
    width: 225px;
  }
  .u-section-1 .u-container-layout-2 {
    padding-left: 20px;
    padding-right: 20px;
  }
  .u-section-1 .u-image-3 {
    width: 234px;
  }
  .u-section-1 .u-group-3 {
    width: 225px;
  }
  .u-section-1 .u-container-layout-6 {
    padding-left: 20px;
    padding-right: 20px;
  }
}
@media (max-width: 991px) {
  .u-section-1 .u-sheet-1 {
    min-height: 1186px;
  }
  .u-section-1 .u-repeater-1 {
    grid-template-columns: repeat(2, calc(50% - 11.000025px));
  }
  .u-section-1 .u-image-1 {
    height: 253px;
    margin-top: -30px;
    width: 284px;
  }
  .u-section-1 .u-group-1 {
    min-height: 240px;
    margin-top: -1px;
    width: 259px;
  }
  .u-section-1 .u-container-layout-2 {
    padding-top: 30px;
  }
  .u-section-1 .u-image-3 {
    height: 253px;
    margin-top: -30px;
    width: 284px;
  }
  .u-section-1 .u-group-3 {
    min-height: 240px;
    margin-top: -1px;
    width: 259px;
  }
  .u-section-1 .u-container-layout-6 {
    padding-top: 30px;
  }
}
@media (max-width: 767px) {
  .u-section-1 .u-repeater-1 {
    grid-template-columns: 100%;
  }
  .u-section-1 .u-container-layout-1 {
    padding-top: 20px;
    padding-left: 10px;
    padding-right: 10px;
  }
  .u-section-1 .u-image-1 {
    height: 299px;
    margin-top: -20px;
  }
  .u-section-1 .u-group-1 {
    min-height: 163px;
    margin-top: -49px;
  }
  .u-section-1 .u-container-layout-2 {
    padding-left: 30px;
    padding-right: 30px;
  }
  .u-section-1 .u-container-layout-3 {
    padding-left: 10px;
    padding-right: 10px;
  }
  .u-section-1 .u-container-layout-4 {
    padding-left: 10px;
    padding-right: 10px;
  }
  .u-section-1 .u-container-layout-5 {
    padding-top: 20px;
    padding-left: 10px;
    padding-right: 10px;
  }
  .u-section-1 .u-image-3 {
    height: 299px;
    margin-top: -20px;
  }
  .u-section-1 .u-group-3 {
    min-height: 163px;
    margin-top: -49px;
  }
  .u-section-1 .u-container-layout-6 {
    padding-left: 30px;
    padding-right: 30px;
  }
}

</style>
STYLES;
$document->addCustomTag($blogStyles);

ob_start(); ?>

<?php
$backToTop = ob_get_clean();

ob_start();
?>

<?php
$popupDialogs= ob_get_clean();

$settings = array(
    'hideHeader' => false,
    'hideFooter' => false,
    'bodyClass' => 'u-body u-xxl-mode',
    'bodyStyle' => "",
    'localFontsFile' => "",
    'backToTop' => $backToTop,
    'popupDialogs' => $popupDialogs,
);
echo '<!--component_settings-->' . json_encode($settings) . '<!--/component_settings-->';

?>
<?php

$funcsInfo = array(
   array('repeatable' => true, 'name' => 'blogTemplate_0_blog_1', 'itemsExists' => true),

);

$funcsStaticInfo = array(

);

if ($this->params->get('show_page_heading')) {
    echo '<section class="u-clearfix"><div class="u-clearfix u-sheet"><h1>';
    echo $this->params->get('page_heading');
    echo '</h1></div></section>';
}

if (count($funcsInfo)) {
    foreach ($funcsInfo as $funcInfo) {
        if (!$funcInfo['itemsExists']) {
            include $themePath . '/views/' . $funcInfo['name'] . '.php';
            continue;
        }
        if (file_exists($themePath . '/views/' . $funcInfo['name'] . '_start.php')) {
            include $themePath . '/views/' . $funcInfo['name'] . '_start.php';
        }
        foreach ($allItems as $item) {
            $j = 0;
            $article = $component->article('archive', $item, $item->params);

            ${'title' . $j} = strlen($article->title) ? $this->escape($article->title) : '';
            ${'titleLink' . $j} = strlen($article->titleLink) ? $article->titleLink : '';

            // Readmore button not need on archive blog
            ${'readmore' . $j} = '';
            ${'readmoreLink' . $j} = '';

            ${'shareLink' . $j} = strlen($article->shareLink) ? $article->shareLink : '';
            ${'content' . $j} = $article->intro(funcBalanceTags($article->intro));
            ${'postItemInvisible' . $j} = true;
            ${'image' . $j} = null;
            ${'tags' . $j} = null;

            ${'metadata' . $j} = array();
            if (strlen($article->author)) {
                ${'metadata' . $j}['author'] = $article->authorInfo($article->author, $article->authorLink);
            }
            if (strlen($article->published)) {
                ${'metadata' . $j}['date'] = $article->publishedDateInfo($article->published);
            }
            if (strlen($article->category)) {
                ${'metadata' . $j}['category'] = $article->categories($article->parentCategory, $article->parentCategoryLink, $article->category, $article->categoryLink);
            }
            include $themePath . '/views/' . $funcInfo['name'] . '.php';
        }
        if (file_exists($themePath . '/views/' . $funcInfo['name'] . '_end.php')) {
            include $themePath . '/views/' . $funcInfo['name'] . '_end.php';
        }
    }
}

if (count($funcsStaticInfo)) {
    for ($i = 0; $i < count($funcsStaticInfo); $i++) {
        include_once $themePath . '/views/' . $funcsStaticInfo[$i]['name'] . '.php';
    }
}
