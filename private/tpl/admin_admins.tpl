<h2><?php print(Flight::get('lang.admin_admins_title')); ?></h2>
<div class="text-center my-3">
	<form method="POST" action="">
		<input placeholder="<?php print(Flight::get('lang.admin_insertnick')); ?>" value="" name="post_nick" required>
		<button type="submit" onclick="return confirm(<?php print(Flight::get('lang.admincp_acceptdo')); ?>)"><?php print(Flight::get('lang.admin_giveperm')); ?></button>
	</form>
</div>
<?php print(Flight::get('admins_list')); ?>