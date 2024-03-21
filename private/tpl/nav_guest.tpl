<li class="nav-item">
	<a class="nav-link <?php if(Flight::get('app.path.login.a')) print('active'); ?>" href="<?php print(Flight::get('app.url')); ?>logowanie"><?php print(Flight::get('lang.nav_guest_login')); ?></a>
</li>
<li class="nav-item">
	<a class="nav-link <?php if(Flight::get('app.path.register.a')) print('active'); ?>" href="<?php print(Flight::get('app.url')); ?>rejestracja"><?php print(Flight::get('lang.nav_guest_register')); ?></a>
</li>