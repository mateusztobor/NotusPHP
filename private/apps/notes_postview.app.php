<?php
	
	Flight::route('/@id:[0-9]{'.Flight::get('app.notes.pin_length').'}', function($id){
		$controller = new notes_postview_controller($id);
		$controller->view();
	});