<?php
	$controller = new notes_controller();
	Flight::route('/'.Flight::get('app.path.notes'), array($controller, 'view'));