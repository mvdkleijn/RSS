<?php


Plugin::setInfos(array(
    'id'          => 'rss',
    'title'       => 'RSS Parser', 
    'description' => 'Parses external RSS feeds and displays on your site', 
    'version'     => '0.2.1',
	'update_url'  => 'http://www.band-x.org/downloads/open-source/update.xml',
    'author'      => 'Andrew Waters',
    'website'     => 'http://www.band-x.org')
);


Plugin::addController('rss', 'RSS');


function rss($id) {

	require_once('inc/rss_fetch.inc');

	global $__FROG_CONN__;

	$sql = "SELECT * FROM ".TABLE_PREFIX."rss_template WHERE id='1'";
	$sql = $__FROG_CONN__->prepare($sql);
	$sql->execute();

	while($temp = $sql->fetchObject()){
		$template = $temp->template;
	}

	$sql = "SELECT * FROM ".TABLE_PREFIX."rss WHERE id='$id'";
	$sql = $__FROG_CONN__->prepare($sql);
	$sql->execute();

	while($rss_feed = $sql->fetchObject()){
		$rssname = $rss_feed->rssname;
		$rssurl = $rss_feed->rssurl;
		$articles = fetch_rss($rssurl);
	}

	echo eval("?>".$template);

}