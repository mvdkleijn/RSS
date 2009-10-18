<h1><img src="<?php echo URL_PUBLIC; ?>wolf/plugins/rss/images/home.png" align="center" /> RSS Feeds</h1>
<p>This plugin will allow you to add RSS and ATOM feeds into your database and then call them back on a page that you request.</p>
<p>To get started, <a href="<?php echo get_url('plugin/rss/add'); ?>">add a feed</a> to the list. Once added, copy the PHP code to add in your page part or snippet. You can also customise the way the articles are displayed on your site by <a href="<?php echo get_url('plugin/rss/settings'); ?>">editing the template</a></p>
<p>&nbsp;</p>

<table class="index" cellpadding="0" cellspacing="0" border="0">
	<thead>
		<tr>
			<th width="60%" style="font-weight: bold; font-size: 16px;"></th>
			<th width="20%" style="font-weight: bold; font-size: 16px; text-align: right;">Code to Use</th>
			<th width="20%" style="font-weight: bold; font-size: 16px; text-align: right;">Modify</th>
		</tr>
	</thead>
<tbody>
<?php
	global $__CMS_CONN__;

	$check_db = "SELECT * FROM ".TABLE_PREFIX."rss";
	$check_db = $__CMS_CONN__->prepare($check_db);
	$check_db->execute();
	$check_db_count = $check_db->rowCount();

	if ($check_db_count != 0) {
		$sql = "SELECT * FROM ".TABLE_PREFIX."rss";
		$sql = $__CMS_CONN__->prepare($sql);
		$sql->execute();

		while($rss_feed = $sql->fetchObject()){
			global $__CMS_CONN__;
			$id = $rss_feed->id;
			$url = $rss_feed->rssurl;
			$name = $rss_feed->rssname;
			$type = explode(".",$url);
			$type = $type[count($type)-1];
			$type = strtoupper($type);
			$icon = "rss.png";
?>
<tr id="snippet_<?php echo $tag->id; ?>" class="<?php echo odd_even(); ?>">
	<td>
		<p><strong style="font-weight: bold; font-size: 26px;"><?php echo $name; ?></strong><br />
		<a href="<?php echo $url; ?>"><?php echo $url ; ?></a></p>
	</td>
	<td style="text-align: right;">
		<code>
			<span style="color: #DD0000">&lt;?php</span>&nbsp;rss(<span style="color: #007700">'<?php echo $id; ?>'</span>);<span style="color: #DD0000"> ?&gt;</span>
		</code>
	</td>
	<td style="text-align: right;">
		<a href="<?php echo get_url('plugin/rss/remove/'.$id); ?>" onclick="return confirm('Delete the <?php echo $name ?> feed?');">
			<img src="../wolf/plugins/rss/images/delete.png" alt="remove icon" />
		</a>
		<a href="<?php echo get_url('plugin/rss/edit/'.$id.''); ?>">
			<img src="../wolf/plugins/rss/images/edit.png" alt="edit icon" />
		</a>
	</td>
</tr>
<?php
		}
	}
?>
</tbody>
</table>