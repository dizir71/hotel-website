<?php
use Joomla\CMS\Factory;
$document = Factory::getApplication()->getDocument();
ob_start();
?>
    <footer class="u-align-center-md u-align-center-sm u-align-center-xs u-clearfix u-footer u-gradient u-footer" id="sec-209e">
  <div class="u-clearfix u-sheet u-sheet-1">
    <?php $logoInfo = getLogoInfo(array(
            'src' => "/images/f66f8711-2942-4a88-b7bc-12df544fddc2-54.png",
            'href' => "#",
        ), true); ?><a href="<?php echo $logoInfo['href']; ?>" class="u-image u-logo u-image-1" data-image-width="460" data-image-height="301">
      <img src="<?php echo $logoInfo['src']; ?>" class="u-logo-image u-logo-image-1" data-image-width="157.143">
    </a>
    <div class="u-align-left u-social-icons u-spacing-10 u-social-icons-1">
      <a class="u-social-url" title="Schweizerhof Facebook" target="_blank" href="https://www.facebook.com/schweizerhofamsee">
        <span class="u-icon u-icon-circle u-social-facebook u-social-icon u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 112 112" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-856a"></use></svg><svg class="u-svg-content" viewBox="0 0 112 112" x="0" y="0" id="svg-856a"><circle fill="currentColor" cx="56.1" cy="56.1" r="55"></circle><path fill="#FFFFFF" d="M73.5,31.6h-9.1c-1.4,0-3.6,0.8-3.6,3.9v8.5h12.6L72,58.3H60.8v40.8H43.9V58.3h-8V43.9h8v-9.2
            c0-6.7,3.1-17,17-17h12.5v13.9H73.5z"></path></svg></span>
      </a>
    </div>
    <p class="u-align-center-lg u-align-center-md u-align-center-xl u-align-center-xxl u-text u-text-1">
      <span style="font-weight: 700;">Gasthaus Schweizerhof am See<br>
      </span>Hannelore Simmer, Hauptstrasse 17, 4813 Altmünster, +43 (0) 699 125 300 10<br>
      <a href="mailto:office@schweizerhof-am-see.at?subject=eMail%20von%20Webseite%20Schweizerhof" class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-palette-1-base u-btn-1">eMail an Schweizerhof</a>
    </p>
  </div>
  <style data-mode="XXL" data-visited="true">@media (max-width: 0px) {
   .u-footer {
    background-image: linear-gradient(#73a3de, #f0f5fc);
  }
  .u-footer .u-sheet-1 {
    min-height: 133px;
  }
  .u-footer .u-image-1 {
    width: 178px;
    height: 117px;
    margin-top: 14px;
    margin-right: auto;
    margin-bottom: 0;
    margin-left: 0;
  }
  .u-footer .u-logo-image-1 {
    width: 100%;
    height: 100%;
  }
  .u-footer .u-social-icons-1 {
    height: 73px;
    min-height: 16px;
    width: 73px;
    min-width: 16px;
    white-space: nowrap;
    margin-top: -84px;
    margin-right: 59px;
    margin-bottom: 0;
    margin-left: auto;
  }
  .u-footer .u-icon-1 {
    height: 100%;
    color: rgb(59, 89, 152) !important;
  }
  .u-footer .u-text-1 {
    width: 631px;
    margin-top: -73px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 36px;
  }
  .u-footer .u-btn-1 {
    padding-top: 0;
    padding-bottom: 0;
    padding-left: 0;
    padding-right: 0;
  }
}</style>
</footer>
<?php
ThemeHelper::getInstance()->footerHtml = ob_get_clean();
ob_start();
?>
    
<?php
ThemeHelper::getInstance()->footerExtraHtml = ob_get_clean();

