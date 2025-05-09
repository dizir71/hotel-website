<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

$themeHelper = ThemeHelper::getInstance();
$document = Factory::getDocument();

$pageStyles = <<<STYLES
<style>
.u-section-1 .u-sheet-1 {
  min-height: 279px;
}
.u-section-1 .u-text-1 {
  margin-left: auto;
  margin-right: auto;
  font-size: 1.875rem;
}
.u-section-1 .u-btn-1 {
  background-image: none;
  padding: 0;
}
@media (max-width: 767px) {
  .u-section-1 .u-text-1 {
    margin-top: 60px;
    margin-bottom: 60px;
  }
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
include_once dirname(__FILE__) . '/' . ($lang ? '/' . $lang : '') . '/page404Template_0_error_1.php';
$themeHelper->pageContent = ob_get_clean();
