<h2><?php print(Flight::get('lang.user_settings_title2')); ?></h2>


<h4><?php print(Flight::get('lang.user_settings_chpass_title')); ?></h4>
<?php
	if(Flight::has('notify'))
		Flight::render('alert', array('type' => Flight::get('notify_type'), 'content'=>Flight::get('notify')));
?>
<form action="<?php print(Flight::get('app.url').Flight::get('app.path.account')); ?>" method="post">
	<div class="form-group mb-3">
		<label for="id_oldpassword"><?php print(Flight::get('lang.user_settings_chpass_old_pass')); ?></label>
		<input name="post_oldpassword" value="" required type="password" class="form-control" id="id_oldpassword" placeholder="<?php print(Flight::get('lang.user_settings_chpass_old_pass_placeholder')); ?>">
	</div>
	<div class="form-group mb-3">
		<label for="id_password"><?php print(Flight::get('lang.user_settings_chpass_new_pass')); ?></label>
		<input name="post_password" value="" required type="password" pattern="<?php print(Flight::get('lang.guest_register_password_preg')); ?>" class="form-control" id="id_password" placeholder="<?php print(Flight::get('lang.user_settings_chpass_new_pass_placeholder')); ?>">
		<small class="form-text text-muted"><?php print(Flight::get('lang.guest_register_password_info')); ?></small>
	</div>
	<div class="form-group mb-3">
		<label for="id_repassword"><?php print(Flight::get('lang.user_settings_chpass_repass')); ?></label>
		<input value="" required type="password" name="post_repassword" class="form-control" id="id_repassword" placeholder="<?php print(Flight::get('lang.user_settings_chpass_repass_placeholder')); ?>">
	</div>
	<button type="submit" class="btn btn-danger"><?php print(Flight::get('lang.user_settings_save_button')); ?></button>
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
                txtConfirmPassword.setCustomValidity("<?php print(Flight::get('lang.guest_register_password_not_match')); ?>");
            ')); ?>
        ')); ?>
    ')); ?>
</script>