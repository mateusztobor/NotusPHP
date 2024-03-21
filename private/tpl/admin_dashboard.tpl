<h2><?php print(Flight::get('lang.admincp_dashboard_title')); ?></h2>
<div class="mb-5 lead"><?php print(Flight::get('lang.admincp_dashboard_desc')); ?></div>
<div class="row">
	<div class="col"><h5><?php print(Flight::get('lang.phpver')); ?>:</h5></div>
	<div class="col-8"><h5><span class="badge bg-danger"><?php print(phpversion()); ?></span></h5></div>
</div>
<div class="row mb-5">
	<div class="col"><h5><?php print(Flight::get('lang.db_size')); ?>:</h5></div>
	<div class="col-8"><h5><span class="badge bg-danger"><?php print(Flight::get('db_size')); ?> KB</span></h5></div>
</div>
<div class="row">
	<div class="col"><h5><?php print(Flight::get('lang.count_users')); ?>:</h5></div>
	<div class="col-8"><h5><span class="badge bg-danger"><?php print(Flight::get('count_users')); ?></span></h5></div>
</div>
<div class="row">
	<div class="col"><h5><?php print(Flight::get('lang.count_posts')); ?>:</h5></div>
	<div class="col-8"><h5><span class="badge bg-danger"><?php print(Flight::get('count_posts')); ?></span></h5></div>
</div>
<div class="row">
	<div class="col"><h5><?php print(Flight::get('lang.count_posts_users')); ?>:</h5></div>
	<div class="col-8"><h5><span class="badge bg-danger"><?php print(Flight::get('count_posts_users')); ?></span></h5></div>
</div>
<div class="row mb-5">
	<div class="col"><h5><?php print(Flight::get('lang.count_posts_guests')); ?>:</h5></div>
	<div class="col-8"><h5><span class="badge bg-danger"><?php print(Flight::get('count_posts_guests')); ?></span></h5></div>
</div>

<h5 class="mb-3"><?php print(Flight::get('lang.last_added_post')); ?>: <span class="badge bg-danger"><?php print(Flight::get('last_added_post_date')); ?></span> <a href="<?php print(Flight::get('app.url').Flight::get('last_added_post')); ?>" class="btn btn-secondary"><?php print(Flight::get('lang.gotopost')); ?></a></h5>
<h5 class="mb-3"><?php print(Flight::get('lang.last_modified_post')); ?>: <span class="badge bg-danger"><?php print(Flight::get('last_modified_post_date')); ?></span> <a href="<?php print(Flight::get('app.url').Flight::get('last_modified_post')); ?>" class="btn btn-secondary"><?php print(Flight::get('lang.gotopost')); ?></a></h5>
<div id="chartContainer"></div>
<div style="clear:both;"></div>