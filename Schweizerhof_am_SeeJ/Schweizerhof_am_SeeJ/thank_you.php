<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Uri\Uri;

$indexDir = dirname(__FILE__);
require_once $indexDir .  '/functions.php';

HTMLHelper::_('bootstrap.framework');

$app = Factory::getApplication();
$config = $app->getConfig();
$sef = $app->get('sef', false);

$defaultLogo = getLogoInfo(array('src' => "/images/f66f8711-2942-4a88-b7bc-12df544fddc2-54.png"));

$errorDocument = $this;
$document = $app->getDocument();

if ($sef) {
    $document->setBase(Uri::getInstance()->toString());
}

$metaGeneratorContent = 'Nicepage 7.5.3, nicepage.com';
if ($metaGeneratorContent) {
    $document->setMetaData('generator', $metaGeneratorContent);
}
$metaReferrer = '';
if ($metaReferrer) {
    $document->setMetaData('referrer', 'origin');
}

$templateUrl = $errorDocument->baseurl . '/templates/' . $errorDocument->template;
$faviconPath = "favicon.png" ? $templateUrl . '/images/' . "favicon.png" : '';

Core::load("Core_Page");
Core::load("Core_PageProperties");

// Initialize $view:
$view = new CorePage($this);

$themeOptions = $app->getTemplate(true)->params;
include_once $indexDir . '/views/thank_you_1.php';

$pageProperties = new CorePageProperties($document, 'ThankYou');
$bodyClass = $pageProperties->getBodyClass('');
$bodyStyle = $pageProperties->getBodyStyle();
$backToTop = $pageProperties->getBackToTop();
$popupDialogs = $pageProperties->getPopupDialogs();
$showHeader = $pageProperties->showHeader();
$showFooter = $pageProperties->showFooter();
$localFontsFile = $pageProperties->getLocalFontsFile();

$themeHelper = ThemeHelper::getInstance();
$pageContent = isset($themeHelper->pageContent) && $themeHelper->pageContent ? $themeHelper->pageContent : '';
$pageStyles = isset($themeHelper->pageStyles) && $themeHelper->pageStyles ? $themeHelper->pageStyles : '';
$themeHelper->pageType = '404';
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <?php if ($faviconPath) : ?>
        <link href="<?php echo $faviconPath; ?>" rel="icon" type="image/x-icon" />
    <?php endif; ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    
    <meta name="theme-color" content="#478ac9">
    <link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/default.css" media="screen" type="text/css" />
    <?php if($view->isFrontEditing()) : ?>
        <link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/frontediting.css" media="screen" type="text/css" />
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/template.css" media="screen" type="text/css" />
    <link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/media.css" id="theme-media-css" media="screen" type="text/css" />
    <?php if ($localFontsFile) : ?><link rel="stylesheet" href="<?php echo $templateUrl; ?>/css/<?php echo $localFontsFile; ?>" media="screen" type="text/css" /><?php else : ?><?php endif; ?><link id="u-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee:400,400i|Besley:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <?php include_once "$indexDir/styles.php"; ?>
    <script src="<?php echo $templateUrl; ?>/scripts/jquery.js"></script>
    <script src="<?php echo $templateUrl; ?>/scripts/script.js"></script>
    <?php echo $pageStyles; ?>
    
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
    $view->renderHeader($indexDir);
}
?>
<?php echo $pageContent; ?>
<?php
if ($showFooter) {
    $view->renderFooter($indexDir);
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
