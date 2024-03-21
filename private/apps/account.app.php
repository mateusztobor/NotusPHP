<?php
	if(Flight::get('user.type') > 0) {
		$controller = new account_controller();
		Flight::route('/'.Flight::get('app.path.account'), array($controller, 'view'));
	}