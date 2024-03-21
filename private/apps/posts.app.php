<?php
	if(Flight::get('user.type') > 0) {
		$controller = new posts_controller();
		Flight::route('/'.Flight::get('app.path.posts'), array($controller, 'view'));
	}