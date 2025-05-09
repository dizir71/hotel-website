<?php
use Joomla\CMS\Factory;
$document = Factory::getApplication()->getDocument();
ob_start();
?>
    <header class="u-align-center u-clearfix u-gradient u-header u-header" id="sec-264e">
  <div class="u-clearfix u-sheet u-sheet-1">
    <div class="u-container-style u-group u-group-1">
      <div class="u-container-layout">
        <?php $logoInfo = getLogoInfo(array(
            'src' => "/images/f66f8711-2942-4a88-b7bc-12df544fddc2-54.png",
            'href' => "72602537",
        ), true); ?><a href="<?php echo $logoInfo['href']; ?>" class="u-hover-feature u-image u-logo u-image-1" data-image-width="460" data-image-height="301" title="Gästehaus">
          <img src="<?php echo $logoInfo['src']; ?>" class="u-logo-image u-logo-image-1" data-image-width="132.5715" alt="Schweizerhof am See">
        </a>
        <div class="u-clearfix u-custom-html u-custom-html-1"><!-- weather widget start -->
          <a target="_blank" href="https://hotel-mix.de/weather/altmuenster-57803">
            <img src="https://w.bookcdn.com/weather/picture/25_57803_1_2_3498db_250_2980b9_ffffff_ffffff_1_2071c9_ffffff_0_6.png?scode=124&amp;domid=596&amp;anc_id=17561" alt="booked.net">
          </a><!-- weather widget end -->
        </div>
        <a href="[post_4]5714008" class="u-active-none u-align-center u-border-3 u-border-active-white u-border-hover-white u-border-palette-1-base u-btn u-btn-round u-button-style u-custom-font u-font-montserrat u-gradient u-hover-black u-none u-radius-4 u-text-black u-text-hover-white u-btn-1">BUCHEN</a>
        <?php echo CoreStatements::position('hmenu', '', 1, 'hmenu'); ?>
      </div>
    </div>
  </div>
  <style data-mode="XXL">@media (max-width: 0px) {
   .u-header {
    background-image: linear-gradient(#f0f5fc, #73a3de);
  }
  .u-header .u-sheet-1 {
    min-height: 152px;
  }
  .u-header .u-group-1 {
    width: 1008px;
    min-height: 115px;
    margin-top: 33px;
    margin-right: auto;
    margin-bottom: 4px;
    margin-left: 92px;
  }
  .u-header .u-image-1 {
    width: 163px;
    height: 107px;
    transition-duration: 0.5s;
    margin-top: 0;
    margin-right: auto;
    margin-bottom: 0;
    margin-left: 205px;
  }
  .u-header .u-logo-image-1 {
    width: 100%;
    height: 100%;
  }
  .u-header .u-custom-html-1 {
    min-height: 115px;
    margin-top: -107px;
    margin-right: 891px;
    margin-bottom: 0;
    margin-left: 0;
  }
  .u-header .u-btn-1 {
    align-self: flex-end;
    border-style: solid;
    letter-spacing: 0px;
    text-transform: uppercase;
    background-image: linear-gradient(#73a3de, #f0f5fc);
    font-weight: 700;
    font-size: 1.14286rem;
    box-shadow: 5px 5px 20px 0 rgba(0,0,0,0.4);
    margin-top: -82px;
    margin-right: 0;
    margin-bottom: 0;
    margin-left: auto;
  }
  .u-header .u-menu-1 {
    margin-top: -40px;
    margin-right: 153px;
    margin-bottom: 0;
    margin-left: auto;
  }
  .u-header .u-nav-1 {
    font-weight: 400;
    font-size: 1.28571rem;
  }
  .u-header .u-nav-5 {
    font-size: 1.25rem;
    margin-top: 20px;
    margin-bottom: 0;
  }
  .u-header .u-menu-close-1 {
    margin-top: 20px;
    margin-bottom: 0;
  }
}</style>
</header>
<?php
ThemeHelper::getInstance()->headerHtml = ob_get_clean();
ob_start();
?>
    
<?php
ThemeHelper::getInstance()->headerExtraHtml = ob_get_clean();
