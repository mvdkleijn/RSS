<h1><img src="<?php echo URL_PUBLIC; ?>wolf/plugins/rss/images/add.png" align="center" /> Add a Feed</h1>
<form name="add_rss_form" action="<?php echo get_url('plugin/rss/public_add/'); ?>" method="post">
	<div class="form-area">
		<p class="title">
			<label for="rssname">Feed Title: </label>
			<input class="textbox" type="text" id="rssname" name="rssname" size="30"><br>
			<label for="rssurl">URL: </label>
			<input class="textbox" type="text" id="rssurl" name="rssurl" size="30"><br>
			<input class="button" name="add_feed" type="submit" value="Add Feed">
		</p>
	</div>
</form>