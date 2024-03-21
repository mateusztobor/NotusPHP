<?php
	if(Flight::get('user.type') == 2) {
		$controller = new admin_users_controller();
		Flight::route('/'.Flight::get('app.path.admin_users'), array($controller, 'view'));
	}