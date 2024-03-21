<?php
	if(Flight::get('user.type') == 0) {
		$controller = new login_controller();
		Flight::route('/'.Flight::get('app.path.login'), array($controller, 'view'));
	}