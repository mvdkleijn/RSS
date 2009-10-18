<?php

class RssController extends PluginController {

	public function __construct() {
		$this->setLayout('backend');
		$this->assignToLayout('sidebar', new View('../../plugins/rss/views/sidebar'));
	}
	
	public function index() {
		$this->display('rss/views/index');
	}
	
	public function add() {
		$this->display('rss/views/add');
	}

	public function edit($id) {
	    $this->display('rss/views/edit', array('id' => $id));
	}

	public function settings() {
		$this->display('rss/views/settings');
	}

	public function documentation() {
		$this->display('rss/views/index');
	}
	
    public function public_add() {
		$rssname = mysql_escape_string($_POST['rssname']);
		$rssurl = mysql_escape_string($_POST['rssurl']);
		if(empty($_POST['rssname']) || empty($_POST['rssurl'])) {
			Flash::set('error', __('Sorry, you need to add a name and feed URL'));
			redirect(get_url('plugin/rss/add'));
		}
		else {
			global $__CMS_CONN__;
			$add_feed = "INSERT INTO ".TABLE_PREFIX."rss (rssname, rssurl) VALUES ('".$rssname."', '".$rssurl."')" ;  
			$add_feed = $__CMS_CONN__->prepare($add_feed);
    	    $add_feed->execute();  
			Flash::set('success', __('Your RSS Feed has been added'));
			redirect(get_url('plugin/rss/index'));
		}	    	
	}
    
	function remove($id) {
		global $__CMS_CONN__;
		$remove_feed = "DELETE FROM ".TABLE_PREFIX."rss WHERE id='$id'";
		$remove_feed = $__CMS_CONN__->prepare($remove_feed);
		$remove_feed->execute();
		Flash::set('success', __('This feed has been deleted'));
		redirect(get_url('plugin/rss/index'));
	}
    


    public function public_edit() {
		$id = mysql_escape_string($_POST['id']);
		$rssname = mysql_escape_string($_POST['rssname']);
		$rssurl = mysql_escape_string($_POST['rssurl']);
		if ($rssname == "" || $rssurl == "" || $id == "") {
				Flash::set('error', __('Sorry, some of the fields were not filled in!'));
				redirect(get_url('plugin/rss/edit/'.$id));
		}
		else {
				global $__CMS_CONN__;
				$edit_feed = "UPDATE ".TABLE_PREFIX."rss SET `rssname`='".$rssname."',`rssurl`='".$rssurl."' WHERE id='".$id."'";
				$edit_feed = $__CMS_CONN__->prepare($edit_feed);
				$edit_feed->execute();
				Flash::set('success', __('The feed has been edited.'));
				redirect(get_url('plugin/rss/index'));
		}
	}

	public function template_edit() {
		$template = mysql_escape_string($_POST['template']);
		if($template == "") {
			Flash::set('error', __('There was a problem editing the RSS template'));
			redirect(get_url('plugin/rss/settings/'));
		}
		else {
			global $__CMS_CONN__;
			$edit_template = "UPDATE ".TABLE_PREFIX."rss_template SET `template`='$template' WHERE id='1'";
			$edit_template = $__CMS_CONN__->prepare($edit_template);
			$edit_template->execute();
			FLASH::set('success', __('The template has been edited'));
			redirect(get_url('plugin/rss/settings/'));
		}
	}
}


