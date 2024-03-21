<?php
	Flight::map('get_pin', function($length){
		$chars= "0123456789";
		$output="";
		for ($i=0; $i < $length; $i++){
			$output .= substr($chars, rand(0, strlen($chars)-1), 1);
		}
		return $output;
	});
	
	Flight::map('get_pin_unique', function($length,$table,$col){
		$count = 1;
		Flight::db_open();
		while($count>0) {
			$pin = Flight::get_pin($length);
			$count = Flight::db()->querySingle('SELECT COUNT(*) as count FROM '.$table.' WHERE '.$col.'="'.$pin.'";');
		}
		return $pin;
	});
?>