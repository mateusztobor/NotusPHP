<?php Flight::render('main_start', array('title' => Flight::get('notify_title').' - '.Flight::get('app.name'))); ?>
<div class="alert alert-<?php print(Flight::get('notify_type')); ?>" role="alert"><?php print(Flight::get('notify')); ?></div>	
<?php Flight::render('main_end'); ?>