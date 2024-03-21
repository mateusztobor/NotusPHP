<?php
	if(Flight::get('user.type') == 0) {
		$controller = new register_controller();
		Flight::route('/'.Flight::get('app.path.register'), array($controller, 'view'));
	}