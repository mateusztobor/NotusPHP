<li class="nav-item">
	<div class="dropdown">
	  <a class="btn btn-danger dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
		<?php print(Flight::get('lang.admincp')); ?>
	  </a>

	  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
		<li><a class="dropdown-item <?php if(Flight::get('app.path.admin_dashboard.a')) print('active'); ?>" href="<?php print(Flight::get('app.url').Flight::get('app.path.admin_dashboard')); ?>"><?php print(Flight::get('lang.admin_dashboard')); ?></a></li>
		<li><a class="dropdown-item <?php if(Flight::get('app.path.admin_admins.a')) print('active'); ?>" href="<?php print(Flight::get('app.url').Flight::get('app.path.admin_admins')); ?>"><?php print(Flight::get('lang.admin_admins')); ?></a></li>
		<li><a class="dropdown-item <?php if(Flight::get('app.path.admin_users.a')) print('active'); ?>" href="<?php print(Flight::get('app.url').Flight::get('app.path.admin_users')); ?>"><?php print(Flight::get('lang.admin_users')); ?></a></li>
	  </ul>
	</div>
</li>