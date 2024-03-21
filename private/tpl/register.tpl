<h4><?php print(Flight::get('lang.guest_register_title2')); ?></h4>
<div class="mb-3 lead"><?php print(Flight::get('lang.guest_register_desc')); ?></div>

<?php
	if(Flight::has('notify')) {
		if(Flight::get('notify_type') == 'warning') Flight::set('notify', '<ul class="py-0 my-0">'.Flight::get('notify').'</ul>');
		
		Flight::render('alert', array('type' => Flight::get('notify_type'), 'content'=>Flight::get('notify')));
	}
?>

<form action="<?php print(Flight::get('app.url').Flight::get('app.path.register')); ?>" method="post">
	<div class="form-group mb-3">
		<label for="id_login"><?php print(Flight::get('lang.guest_register_email')); ?></label>
		<input name="post_email" value="<?php if(isset($_POST['post_email'])) print($_POST['post_email']); ?>" required type="email" class="form-control" id="id_login" placeholder="<?php print(Flight::get('lang.guest_register_email_placeholder')); ?>">
	</div>
	<div class="form-group mb-3">
		<label for="id_nick"><?php print(Flight::get('lang.guest_register_nick')); ?></label>
		<input name="post_nick" value="<?php if(isset($_POST['post_nick'])) print($_POST['post_nick']); ?>" required type="text" class="form-control" id="id_nick" placeholder="<?php print(Flight::get('lang.guest_register_nick_placeholder')); ?>">
		<small class="form-text text-muted"><?php print(Flight::get('lang.guest_register_nick_info')); ?></small>
	</div>
	<div class="form-group mb-3">
		<label for="id_password"><?php print(Flight::get('lang.guest_register_password')); ?></label>
		<input name="post_password" value="" required type="password" pattern="<?php print(Flight::get('lang.guest_register_password_preg')); ?>" class="form-control" id="id_password" placeholder="<?php print(Flight::get('lang.guest_register_password_placeholder')); ?>">
		<small class="form-text text-muted"><?php print(Flight::get('lang.guest_register_password_info')); ?></small>
	</div>
	<div class="form-group mb-3">
		<label for="id_repassword"><?php print(Flight::get('lang.guest_register_repassword')); ?></label>
		<input value="" required type="password" name="post_repassword" class="form-control" id="id_repassword" placeholder="<?php print(Flight::get('lang.guest_register_repassword_placeholder')); ?>">
	</div>
	<button type="submit" class="btn btn-danger"><?php print(Flight::get('lang.guest_register_btn')); ?></button>
</form>
<script type="text/javascript">
    window.onload = function () {
        var txtPassword = document.getElementById("id_password");
        var txtConfirmPassword = document.getElementById("id_repassword");
        txtPassword.onchange = ConfirmPassword;
        txtConfirmPassword.onkeyup = ConfirmPassword;
        function ConfirmPassword() {
            txtConfirmPassword.setCustomValidity("");
            if (txtPassword.value != txtConfirmPassword.value) {
                txtConfirmPassword.setCustomValidity(<?php print('"'.Flight::get('lang.guest_register_password_not_match').'"'); ?>);
            }
        }
    }
</script>