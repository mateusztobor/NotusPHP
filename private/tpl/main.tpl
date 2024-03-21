<?php
	Flight::render('main_start', array('title' => $title.' - '.Flight::get('app.name')));
	Flight::render($tpl); 
	Flight::render('main_end'); 
?>
