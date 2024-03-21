<?php
	
	//MAIN APP
	Flight::set('app.name', 'Notuś');
	Flight::set('app.url', 'http://localhost/JPDSI1/projekt/');
	
	Flight::set('app.lang','pl');
	Flight::set('app.langs_path','private/langs/');
	Flight::set('app.apps_path','private/apps/');
	Flight::set('app.apps_ext','.app.php');
	Flight::set('app.appsclass_ext','.class.php');
	Flight::set('app.extensions_path','private/extensions/');
	Flight::set('app.extensions_ext','.ext.php');
	Flight::set('app.extensions_run_ext','.run.php');
	Flight::set('app.session_name',md5('Notuś_LogIN'));
	
	//Others APPS...
	Flight::set('app.notes.pin_length',6);
	Flight::set('app.notes.view_post_max_lenght',90);
	
	//APPS paths
	Flight::set('app.path.notes','');
	Flight::set('app.path.search','szukaj');
	Flight::set('app.path.login','logowanie');
	Flight::set('app.path.register','rejestracja');
	Flight::set('app.path.account','ustawienia-konta');
	Flight::set('app.path.logout','wyloguj');
	Flight::set('app.path.categories','kategorie');
	Flight::set('app.path.posts','notatki');
	Flight::set('app.path.txt','txt');
	Flight::set('app.path.categories','kategorie');
	Flight::set('app.path.admin_dashboard','admin/dashboard');
	Flight::set('app.path.admin_admins','admin/admins');
	Flight::set('app.path.admin_users','admin/users');
	
	//Flight
	Flight::set('flight.base_url', NULL); //Override the base url of the request. (default: null)
	Flight::set('flight.case_sensitive', false); //Case sensitive matching for URLs. (default: false)
	Flight::set('flight.handle_errors', true); //Allow Flight to handle all errors internally. (default: true)
	Flight::set('flight.log_errors', true);
	Flight::set('flight.views.path', 'private/tpl');
	Flight::set('flight.views.extension', '.tpl');
	
	//PHP
	Flight::set('php.error_reporting', E_ALL);
	Flight::set('php.timezone', 'Europe/Warsaw');
	Flight::set('php.charset', 'utf-8');
	
	//DB
	Flight::set('db.path', 'private/db.db');
	
	//Bootstrap
	Flight::set('bootstrap.path','public/bootstrap/');