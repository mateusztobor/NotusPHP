<?php
	if(Flight::get('user.type') != 0) {
		Flight::route('/'.Flight::get('app.path.logout'), function(){
			Flight::destroy_session();
		});
	}