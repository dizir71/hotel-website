<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

$themeHelper = ThemeHelper::getInstance();
$document = Factory::getDocument();

$pageStyles = <<<STYLES
<style>
 .u-section-1 {
  background-image: none;
}
.u-section-1 .u-sheet-1 {
  min-height: 800px;
}
.u-section-1 .u-text-1 {
  margin: 60px auto 0;
}
.u-section-1 .u-text-2 {
  margin: 20px auto 60px;
}
</style>
STYLES;
$themeHelper->pageStyles = $pageStyles;

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
    'bodyClass' => 'u-body u-xl-mode',
    'bodyStyle' => "",
    'localFontsFile' => "",
    'backToTop' => $backToTop,
    'popupDialogs' => $popupDialogs,
);
$lang = checkAndGetLanguage();
ob_start();
echo '<!--component_settings-->' . json_encode($settings) . '<!--/component_settings-->';
include_once dirname(__FILE__) . '/' . ($lang ? '/' . $lang : '') . '/thankYouPageTemplate_0_thank_you_1.php';
$themeHelper->pageContent = ob_get_clean();
