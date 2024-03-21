<h4 class="text-danger"><?php print(Flight::get('lang.guest_login_title2')); ?></h4>
<div class="mb-3 lead"><?php print(Flight::get('lang.guest_login_desc')); ?></div>
<?php
	if(Flight::has('notify'))
		Flight::render('alert', array('type' => 'warning', 'content'=>Flight::get('notify')));
?>
<form action="<?php print(Flight::get('app.url').Flight::get('app.path.login')); ?>" method="post">
	<div class="form-group mb-3">
		<label for="id_email"><?php print(Flight::get('lang.guest_login_email')); ?></label>
		<input name="post_email" value="" required type="text" class="form-control" id="id_email" placeholder="<?php print(Flight::get('lang.guest_login_email_placeholder')); ?>">
	</div>
	<div class="form-group mb-3">
		<label for="id_password"><?php print(Flight::get('lang.guest_login_password')); ?></label>
		<input name="post_password" value="" required type="password" class="form-control" id="id_password" placeholder="<?php print(Flight::get('lang.guest_login_password_placeholder')); ?>">
	</div>
	<button type="submit" class="btn btn-danger"><?php print(Flight::get('lang.guest_login_button')); ?></button>
</form>