<?php
global $__FROG_CONN__;
$rss_deeds = "SELECT * FROM ".TABLE_PREFIX."rss_template";
$rss_deeds = $__FROG_CONN__->prepare($rss_deeds);
$rss_deeds->execute();

while($feed = $rss_deeds->fetchObject()) {
	$template = $feed->template;
}
?>
<h1><img src="<?php echo URL_PUBLIC; ?>wolf/plugins/rss/images/settings.png" align="center" /> Settings</h1>
<h2>Display template</h2>
<form name="add_rss_form" action="<?php echo get_url('plugin/rss/template_edit/'); ?>" method="post">
	<p><textarea class="textarea" id="template"  name="template"><?php echo htmlentities($template); ?></textarea></p>
	<p><input class="button" name="edit_template" type="submit" value="Save"></p>
</form>