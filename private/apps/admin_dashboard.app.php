<?php
	if(Flight::get('user.type') == 2) {
		$controller = new admin_dashboard_controller();
		Flight::route('/'.Flight::get('app.path.admin_dashboard'), array($controller, 'view'));
	}