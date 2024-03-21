<?php
	Flight::map('register_session', function($uid){
		$_SESSION[Flight::get('app.session_name')] = $uid;
		Flight::redirect(Flight::get('app.url'));
	});
	
	Flight::map('destroy_session', function(){
		unset($_SESSION[Flight::get('app.session_name')]);
		Flight::redirect(Flight::get('app.url'));
	});
?>