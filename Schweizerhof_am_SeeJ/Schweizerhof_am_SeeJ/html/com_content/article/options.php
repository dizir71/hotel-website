<?php
defined('_JEXEC') or die;
$listOptions = array();
?>

<?php
$templateStyles = <<<STYLES
<style>
.u-section-1 .u-sheet-1 {
  min-height: 835px;
}
@media (max-width: 991px) {
  .u-section-1 .u-sheet-1 {
    min-height: 782px;
  }
}
@media (max-width: 767px) {
  .u-section-1 .u-sheet-1 {
    min-height: 722px;
  }
}
@media (max-width: 575px) {
  .u-section-1 .u-sheet-1 {
    min-height: 656px;
  }
}
</style>
STYLES;

ob_start(); ?>
    
<?php
$backToTop = ob_get_clean();

ob_start();
?>
    
<?php
$popupDialogs= ob_get_clean();

$listOptions['post_1'] = array(
    'isDefault' => true,
    'fileName' => 'post_1',
    'styles' => $templateStyles,
    'hideHeader' => false,
    'hideFooter' => false,
    'bodyClass' => 'u-body u-xxl-mode',
    'bodyStyle' => "",
    'localFontsFile' => "",
    'backToTop' => $backToTop,
    'popupDialogs' => $popupDialogs,
);
?>
