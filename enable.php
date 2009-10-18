<?php

global $__CMS_CONN__;

// Let's see if we've already installed the app
$check_db = "SELECT * FROM ".TABLE_PREFIX."rss";
$check_db = $__CMS_CONN__->prepare($check_db);
$check_db->execute();
$check_db_count = $check_db->rowCount();

if ($check_db_count != 0) {

}

else {

	$create_rss_table = 'CREATE TABLE `'.TABLE_PREFIX.'rss` (
		`id` int(15) NOT NULL auto_increment,
		`rssurl` varchar(100) collate latin1_general_ci NOT NULL,
		`rssname` varchar(50) collate latin1_general_ci NOT NULL,
		PRIMARY KEY  (id)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ;';
	$create_rss_table = $__CMS_CONN__->prepare($create_rss_table);
	$create_rss_table->execute();


	$create_rss_template_table = 'CREATE TABLE `'.TABLE_PREFIX.'rss_template` (
		`id` int(15) NOT NULL auto_increment,
		`template` varchar(1000) collate latin1_general_ci NOT NULL,
		PRIMARY KEY  (id)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ;';
	$create_rss_template_table = $__CMS_CONN__->prepare($create_rss_template_table);
	$create_rss_template_table->execute();


	$create_rss_template_info = "
	
	INSERT INTO `".TABLE_PREFIX."rss_template`
		(`id`, `template`)
		VALUES
		(1, '<?php\r\n\r\n	foreach (\$articles->items as \$article) {\r\n		\$href = \$article[''link''];\r\n		\$title = \$article[''title''];\r\n		\$description = \$article[''description''];\r\n		\$date = \$article[''pubdate''];\r\n\r\n		echo \"\r\n			<h3><a href=\$href>\$title</a></h3>\r\n			<p>\$description</p>\r\n			<p>Published on \$date<br /><a href=\$href>Read More...</a></p>\";\r\n	}\r\n\r\n?>');";
	$create_rss_template_info = $__CMS_CONN__->prepare($create_rss_template_info);
	$create_rss_template_info->execute();

}

?>