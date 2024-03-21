<?php
	
	Flight::route('/'.Flight::get('app.path.txt').'/@id:[0-9]{'.Flight::get('app.notes.pin_length').'}', function($id){
		$controller = new notes_postview_txt_controller($id);
		$controller->view();
	});