<?php

defined('JPATH_BASE') or die();

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Event\Event;
use Joomla\CMS\Filesystem\File;
use Joomla\CMS\Filesystem\Folder;
use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Component\ComponentHelper;

/**
 * Class WizardInstallerEvents
 */
class WizardInstallerEvents extends CMSPlugin
{
    /**
     * Status type
     */
    const STATUS_ERROR     = 'error';

    /**
     * Status type
     */
    const STATUS_INSTALLED = 'installed';

    /**
     * Status type
     */
    const STATUS_UPDATED   = 'updated';

    /**
     * Messages list
     *
     * @var array
     */
    protected static $messages = array();

    /**
     * Top level installer
     *
     * @var
     */
    protected $toplevel_installer;

    /**
     * Set top installer
     *
     * @param object $installer Installer object
     */
    public function setTopInstaller($installer)
    {
        $this->toplevel_installer = $installer;
    }

    /**
     * WizardInstallerEvents constructor.
     *
     * @param object $subject Subject
     * @param array  $config  Config
     */
    public function __construct(&$subject, $config = array())
    {
        if (!$subject->hasListener([$this, 'onExtensionAfterInstall'], 'onExtensionAfterInstall'))
        {
            $subject->addListener('onExtensionAfterInstall', [$this, 'onExtensionAfterInstall']);
        }
        if (!$subject->hasListener([$this, 'onExtensionAfterUpdate'], 'onExtensionAfterUpdate'))
        {
            $subject->addListener('onExtensionAfterUpdate', [$this, 'onExtensionAfterUpdate']);
        }

        parent::__construct($subject, $config);

        $wizard_css_file = dirname(__FILE__) . '/../style.css';
        $wizard_js_file = dirname(__FILE__) . '/../stepzation.js';
        $wizard_html_file = dirname(__FILE__) . '/../wizard.html';
        $wizard_jquery_file = dirname(__FILE__) . '/../Schweizerhof_am_SeeJ/scripts/jquery.js';

        $tmp_path          = JPATH_ROOT . '/tmp';

        if (Folder::exists($tmp_path)) {
            // Copy install.css to tmp dir for inclusion
            File::copy($wizard_css_file, $tmp_path . '/style.css');
            File::copy($wizard_js_file, $tmp_path . '/stepzation.js');
            File::copy($wizard_html_file, $tmp_path . '/wizard.html');
            File::copy($wizard_jquery_file, $tmp_path . '/jquery.js');
        }
    }

    /**
     * Add message to list
     *
     * @param array  $package Package
     * @param string $status  Status value
     * @param string $message Text message
     */
    public static function addMessage($package, $status, $message = '')
    {
        self::$messages[] = call_user_func_array(array('WizardInstallerEvents', $status), array($package, $message));
    }

    /**
     * Get error html content
     *
     * @param array  $package Package
     * @param string $msg     Message text
     *
     * @return string
     */
    public static function error($package, $msg)
    {
        ob_start();
        ?>
        <ul>
            <li class="wizardinstall-failure">
                <span class="wizardinstall-icon"><span></span></span>
                <span class="wizardinstall-row">The <?php echo ucfirst(trim($package['name'] . ' installation failed'));?></span>
                <span class="wizardinstall-errormsg">
            <?php echo $msg; ?>
        </span>
            </li>
        </ul>
        <?php
        $out = ob_get_clean();

        return $out;
    }

    /**
     * Get installed html page
     *
     * @param array $package Package
     *
     * @return string
     */
    public static function installed($package)
    {
        ob_start();
        ?>
        <span class="wizardinstall-row">The <?php echo ucfirst(trim($package['name'] . ' installed successfully'));?></span>
        <div style="margin: 20px 0 0 0;">Click the <strong>"Set Default"</strong> button to activate the template.</div>
        <?php
        $out = ob_get_clean();

        return $out;
    }

    /**
     * Get updated html page
     *
     * @param array $package Package
     *
     * @return string
     */
    public static function updated($package)
    {
        ob_start();
        ?>
        <span class="wizardinstall-row">The <?php echo ucfirst(trim($package['name'] . ' updated successfully'));?></span>
        <div style="margin: 20px 0 0 0;">Click the <strong>"Set Default"</strong> button to activate the template.</div>
        <?php
        $out = ob_get_clean();

        return $out;
    }

    /**
     * On extension after install
     *
     * @param   Event  $event  The event
     */
    public function onExtensionAfterInstall(Event $event)
    {
        $lang = Factory::getLanguage();
        $lang->load('install_override', dirname(__FILE__), $lang->getTag(), true);
        $this->toplevel_installer->set('extension_message', $this->getMessages());
    }

    /**
     * On extension after update
     *
     * @param   Event  $event  The event
     */
    public function onExtensionAfterUpdate(Event $event)
    {
        $lang = Factory::getLanguage();
        $lang->load('install_override', dirname(__FILE__), $lang->getTag(), true);
        $this->toplevel_installer->set('extension_message', $this->getMessages());
    }

    protected static function loadWizardHtml()
    {
        $buffer = '';
        // Drop out Style
        if (file_exists(JPATH_ROOT . '/tmp/wizard.html')) {
            $buffer .= file_get_contents(JPATH_ROOT . '/tmp/wizard.html');
        }

        return $buffer;
    }

    /**
     * Get messages html content
     *
     * @return string
     */
    protected function getMessages()
    {
        $themeName = 'Schweizerhof_am_SeeJ';
        $pluginName = 'nicepage';

        $pluginExists = false;
        if (file_exists(JPATH_ADMINISTRATOR . '/components/com_' . $pluginName) &&
            ComponentHelper::getComponent('com_' . $pluginName, true)->enabled) {
            $pluginExists = true;
        }

        $pluginSettingsExists = false;
        if ($pluginExists) {
            require_once JPATH_ADMINISTRATOR . '/components/com_' . $pluginName . '/helpers/nicepage.php';
            $config = NicepageHelpersNicepage::getConfig();
            $pluginSettingsExists = isset($config['pluginSettings']) ? true : false;
        }

        $basename = basename(dirname(dirname(dirname(__FILE__))));
        $installerPath = Uri::root(true) . '/' . $basename . '/install_extensions/wizard.php';
        $activateTheme = $installerPath . '?action=activate_theme&template=' . strtolower($themeName);
        $installPlg = $installerPath . '?action=install_plg&plugin=' . $pluginName;
        $checkPlg = $installerPath . '?action=check_plg&plugin=' . $pluginName;
        $checkSettingsIsSet = $installerPath . '?action=settings_is_set&plugin=' . $pluginName;
        $applySettingPlg = $installerPath . '?action=apply_settings_plg&plugin=' . $pluginName;
        $importContent = $installerPath . '?action=import&plugin=' . $pluginName . '&template=' . strtolower($themeName);

        $createPageUrl = Uri::root(true) . '/administrator/index.php?option=com_' . $pluginName . '&task=' . $pluginName . '.start';
        $liveSiteUrl = Uri::root(true);
        $pluginConfigUrl = Uri::root(true) . '/administrator/index.php?option=com_' . $pluginName . '&view=config';

        $buffer = '';
        $buffer .= '<div id="wizardinstall">';
        $buffer .= implode('', self::$messages);
        $buffer .= '</div>';
        if (preg_match('/successful/', $buffer)) {
            $wizardHtml = self::loadWizardHtml();
            $buffer = str_replace(
                array(
                    '[buffer]',
                    '[pluginName]',
                    '[PluginName]',
                    '[activateTheme]',
                    '[installPlg]',
                    '[applySettingsPlg]',
                    '[checkPlg]',
                    '[checkSettingsIsSet]',
                    '[importContent]',
                    '[createPageUrl]',
                    '[liveSiteUrl]',
                    '[pluginConfigUrl]',
                    '[isFirstInstallPlg]',
                    '[showPluginSettings]',
                ),
                array(
                    $buffer,
                    $pluginName,
                    ucfirst($pluginName),
                    $activateTheme,
                    $installPlg,
                    $applySettingPlg,
                    $checkPlg,
                    $checkSettingsIsSet,
                    $importContent,
                    $createPageUrl,
                    $liveSiteUrl,
                    $pluginConfigUrl,
                    !$pluginExists ? 'true' : 'false',
                    $pluginExists && !$pluginSettingsExists ? 'flex' : 'none',

                ),
                $wizardHtml
            );
        }

        return $buffer;
    }
}
