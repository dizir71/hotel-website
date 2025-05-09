<?php

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\HTML\HTMLHelper;

$indexDir = dirname(__FILE__);
require_once $indexDir . '/functions.php';

HTMLHelper::_('jquery.framework');
HTMLHelper::_('bootstrap.framework');

$app = Factory::getApplication();
$config = $app->getConfig();
$sef = $app->get('sef', false);

$defaultLogo = getLogoInfo(array('src' => "/images/f66f8711-2942-4a88-b7bc-12df544fddc2-54.png"));

// Create alias for $this object reference:
$document = $this;

$currentUrl = Uri::getInstance()->toString();
if ($sef)
{
    $document->setBase($currentUrl);
}

$metaGeneratorContent = 'Nicepage 7.5.3, nicepage.com';
if ($metaGeneratorContent) {
    $document->setMetaData('generator', $metaGeneratorContent);
}
$metaReferrer = '';
if ($metaReferrer) {
    $document->setMetaData('referrer', 'origin');
}

$templateUrl = $document->baseurl . '/templates/' . $document->template;
$faviconPath = "favicon.png" ? $templateUrl . '/images/' . "favicon.png" : '';

Core::load("Core_Page");
Core::load("Core_PageProperties");

// Initialize $view:
$view = new CorePage($this);

$pageProperties = new CorePageProperties($this);
$styles = $pageProperties->getStyles();
$bodyClass = $pageProperties->getBodyClass('u-body u-xxl-mode');
$bodyStyle = $pageProperties->getBodyStyle();
$backToTop = $pageProperties->getBackToTop();
$popupDialogs = $pageProperties->getPopupDialogs();
$showHeader = $pageProperties->showHeader();
$showFooter = $pageProperties->showFooter();
$localFontsFile = $pageProperties->getLocalFontsFile();
$themeHelper = $themeHelper = ThemeHelper::getInstance();
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <?php if ($faviconPath) : ?>
        <link href="<?php echo $faviconPath; ?>" rel="icon" type="image/x-icon" />
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta data-intl-tel-input-cdn-path="<?php echo $templateUrl; ?>/scripts/intlTelInput/" />
    <script>
    function gdprConfirmed() {
        return true;
    }
    if (gdprConfirmed()) {
    document.write("\
    \
    <!-- Google Analytics -->\
    <gascript async src=\"https://www.googletagmanager.com/gtag/js?id=UA-62429007-1\"></gascript>\
    <gascript>\
        window.dataLayer = window.dataLayer || [];\
        function gtag(){dataLayer.push(arguments);}\
        gtag('js', new Date());\
        gtag('config', 'UA-62429007-1');\
    </gascript>\
    <!-- End Google Analytics -->\
    ".replace(/gascript/g, 'script'));
    }
    </script>
    
    <?php echo CoreStatements::head(); ?>
    <?php if ($styles) : ?>
        <?php echo $styles; ?>
    <?php endif; ?>
    <meta name="theme-color" content="#73a3de">
    <link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/default.css" media="screen" type="text/css" />
    <?php if($view->isFrontEditing()) : ?>
        <link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/frontediting.css" media="screen" type="text/css" />
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/template.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/media.css" id="theme-media-css" media="screen" type="text/css" />
    <?php if ($localFontsFile) : ?><link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/<?php echo $localFontsFile; ?>" media="screen" type="text/css" /><?php else : ?><?php endif; ?><link id="u-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee:400,400i|Besley:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <?php include_once "$indexDir/styles.php"; ?>
    <?php if ($this->params->get('jquery', '0') == '1') : ?>
        <script src="<?php echo $templateUrl; ?>/scripts/jquery.js"></script>
    <?php endif; ?>
    <script src="<?php echo $templateUrl; ?>/scripts/script.js"></script>
    <?php echo getProductsScript(); ?>
    <?php echo getThankYouScript(); ?>
    <!--theme_captcha_script-->
    
    <!--/theme_captcha_script-->
    <?php if ($this->params->get('jsonld', '0') == '1') : ?>
    <script type="application/ld+json">
{
	"@context": "http://schema.org",
	"@type": "Organization",
	"name": "<?php echo $config->get('sitename'); ?>",
	"sameAs": [
		"https://www.facebook.com/schweizerhofamsee"
	],
	"url": "<?php echo JUri::getInstance()->toString(); ?>",
	"logo": "<?php echo $defaultLogo['src']; ?>"
}
</script>
    <?php
    if ($currentUrl == Uri::base()) {
    ?>
        <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "WebSite",
      "name": "<?php echo $config->get('sitename'); ?>",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "<?php echo Uri::base() . 'index.php?searchword={query' . '}&option=com_search'; ?>",
        "query-input": "required name=query"
      },
      "url": "<?php echo $currentUrl; ?>"
    }
    </script>
    <?php } ?>
    <?php endif; ?>
    <?php if ($this->params->get('metatags', '0') == '1') : ?>
        <?php
        renderSeoTags(ThemeHelper::getInstance()->seoTags);
        ?>
    <?php endif; ?>
    
    <script src="https://web5.deskline.net/dwutility.js"></script>
<script type="text/javascript">
var _iub = _iub || [];
_iub.csConfiguration = {"ccpaAcknowledgeOnDisplay":true,"ccpaApplies":true,"consentOnContinuedBrowsing":false,"cookiePolicyId":41883260,"enableCcpa":true,"floatingPreferencesButtonDisplay":"bottom-right","invalidateConsentWithoutLog":true,"lang":"de","perPurposeConsent":true,"siteId":2557124,"whitelabel":false,"gdprAppliesGlobally":false, "banner":{ "acceptButtonDisplay":true,"closeButtonRejects":true,"customizeButtonDisplay":true,"explicitWithdrawal":true,"listPurposes":true,"position":"float-top-center","rejectButtonDisplay":true }};
</script>
<script type="text/javascript" src="//cdn.iubenda.com/cs/ccpa/stub.js"></script>
<script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>




    
</head>
<body <?php echo $bodyClass . $bodyStyle; ?>>

<?php
if ($showHeader) {
    $view->renderHeader($indexDir, $this->params);
}
?>
<?php $view->renderLayout(); ?>
<?php
if ($showFooter) {
    $view->renderFooter($indexDir, $this->params);
}
?>
<section class="u-backlink u-clearfix u-grey-80">
            <p class="u-text">
                <span>This site was created with the </span>
                <a class="u-link" href="https://nicepage.com/" target="_blank" rel="nofollow">
                    <span>Nicepage</span>
                </a>
             </p>
    </section>

<?php echo $backToTop; ?>
<?php echo $popupDialogs; ?>
</body>
</html>
