<?php
	if(Flight::get('user.type') > 0) {
		$controller = new categories_controller();
		Flight::route('/'.Flight::get('app.path.categories'), array($controller, 'view'));
	}