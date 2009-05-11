<?php if (Dispatcher::getAction() != 'view'): ?>
<p class="button"><a href="<?php echo get_url('plugin/rss'); ?>"><img src="<?php echo URL_PUBLIC; ?>/frog/plugins/rss/images/home.png" align="middle" alt="snippet icon" />Feeds</a></p>
<p class="button"><a href="<?php echo get_url('plugin/rss/add'); ?>"><img src="<?php echo URL_PUBLIC; ?>/frog/plugins/rss/images/add.png" align="middle" alt="snippet icon" />Add a Feed</a></p>
<p class="button"><a href="<?php echo get_url('plugin/rss/settings'); ?>"><img src="<?php echo URL_PUBLIC; ?>frog/plugins/rss/images/settings.png" align="middle" alt="snippet icon" />Settings</a></p>
<?php endif; ?>