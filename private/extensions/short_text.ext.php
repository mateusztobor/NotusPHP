<?php
	Flight::map('short_text', function($text,$max_lenght){
		if (mb_strlen($text) > $max_lenght) {
			$new_text = substr($text, 0, $max_lenght);
			$new_text = trim($new_text);
			return $new_text . "...";
		}
		else return $text;
	});
?>