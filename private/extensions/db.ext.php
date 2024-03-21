<?php
	Flight::map('db_open', function(){
		if(!Flight::has('db.opened')) {
			Flight::register('db', 'SQLite3', array(Flight::get('db.path')));
			Flight::db()->exec('PRAGMA foreign_keys = ON');
			Flight::db()->busyTimeout(700);
			Flight::set('db.opened',true);
		}
	});
	
	Flight::map('db_close', function(){
		if(Flight::has('db.opened')) {
			Flight::db()->close();
			Flight::clear('db.opened');
		}
	});
?>