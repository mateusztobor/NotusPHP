<?php
	Flight::map('notFound', function(){
		Flight::render('main', array('title' => Flight::get('lang.404_title'), 'tpl'=>'error_404'));
	});