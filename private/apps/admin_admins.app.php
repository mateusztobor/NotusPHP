<?php
	if(Flight::get('user.type') == 2) {
		$controller = new admin_admins_controller();
		Flight::route('/'.Flight::get('app.path.admin_admins'), array($controller, 'view'));
	}