<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

extract($displayData);

echo HTMLHelper::_(
	'bootstrap.renderModal',
	'versionsModal',
	array(
		'url'    => $link,
		'title'  => $label,
		'height' => '300px',
		'width'  => '800px',
		'footer' => '<button type="button" class="btn" data-dismiss="modal">'
			. Text::_('JLIB_HTML_BEHAVIOR_CLOSE') . '</button>'
	)
);

?>
<button type="button" onclick="jQuery('#versionsModal').modal('show')" class="btn" data-toggle="modal" title="<?php echo $label; ?>">
	<span class="icon-archive" aria-hidden="true"></span><?php echo $label; ?>
</button>
