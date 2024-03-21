<?php
	if(isset($_SESSION[Flight::get('app.session_name')])) {
		Flight::set('user.id',$_SESSION[Flight::get('app.session_name')]);
		Flight::db_open();
		$count = Flight::db()->querySingle('SELECT COUNT(*) as count FROM users WHERE id="'.Flight::get('user.id').'";');
		if($count == 1) {
			$nick = Flight::db()->querySingle('SELECT nick FROM users WHERE id="'.Flight::get('user.id').'";');
			Flight::set('user.nick',$nick);
			unset($nick);
			
			$email = Flight::db()->querySingle('SELECT email FROM users WHERE id="'.Flight::get('user.id').'";');
			Flight::set('user.email',$email);
			unset($email);
			
			$type = Flight::db()->querySingle('SELECT type FROM users WHERE id="'.Flight::get('user.id').'";');
			Flight::db_close();
			Flight::set('user.type',$type);
			unset($type);
		} else Flight::destroy_session();
	} else
		Flight::set('user.type',0);
?>