<?php
global $__CMS_CONN__;
$rss_deeds = "SELECT * FROM ".TABLE_PREFIX."rss WHERE id=".$id."";
$rss_deeds = $__CMS_CONN__->prepare($rss_deeds);
$rss_deeds->execute();

while($feed = $rss_deeds->fetchObject()) {
	$rssname = $feed->rssname;
	$rssurl = $feed->rssurl;
}

?>
<h1><img src="<?php echo URL_PUBLIC; ?>/frog/plugins/rss/images/edit_large.png" align="center" /> Editing the feed for <?php echo $rssname; ?></h1>
<form name="edit_rss_form" action="<?php echo get_url('plugin/rss/public_edit'); ?>" method="post">
<div class="form-area">
<p class="title">
<label for="rssname">Feed name: </label>
<input class="textbox" type="text" id="rssname" name="rssname" value="<?php echo $rssname; ?>" size="30"><br>
<label for="rssurl">RSS Feed URL: </label>
<input class="textbox" type="text" id="rssurl" name="rssurl" value="<?php echo $rssurl; ?>" size="30"><br>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input class="button" name="edit_rss" type="submit" value="Edit Feed">
</p>
</div>
</form>