<?php
	ob_start();//Opening buffer
	
	require 'private/flight/Flight.php'; //Load framework
	require 'private/config.php'; //Load configs
	
	session_start(); //Start session
	error_reporting(Flight::get('php.error_reporting')); //set error reporting
	header('Content-Type:text/html;charset='.Flight::get('php.charset')); //set header
	date_default_timezone_set(Flight::get('php.timezone')); //set timezone
	
	//Load extensions and run files
	foreach(glob(Flight::get('app.extensions_path').'*'.Flight::get('app.extensions_ext')) as $file)
		require $file; //load apps
	foreach(glob(Flight::get('app.extensions_path').'*'.Flight::get('app.extensions_run_ext')) as $file)
		require $file; //load apps
	
	//load class for apps
	foreach(glob(Flight::get('app.apps_path').'*'.Flight::get('app.appsclass_ext')) as $file)
		require $file; //load apps
	//load apps (route)
	foreach(glob(Flight::get('app.apps_path').'*'.Flight::get('app.apps_ext')) as $file)
		require $file; //load apps
		
	Flight::start(); //run framework
	
	//close db connection
	Flight::db_close();
	
	//End and clear buffer
	ob_end_flush();