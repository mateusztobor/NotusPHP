<?php
	Flight::map('date_pl', function($string){
		$string = date_create($string);
		if(date_format($string, 'Y') == date('Y'))
			$string = date_format($string, 'D, d M H:i');
		else $string = date_format($string, 'D, d M Y H:i');
		
		$string = str_replace('Mon', 'poniedziałek', $string);
		$string = str_replace('Tue', 'wtorek', $string);
		$string = str_replace('Wed', 'środa', $string);
		$string = str_replace('Thu', 'czwartek', $string);
		$string = str_replace('Fri', 'piątek', $string);
		$string = str_replace('Sat', 'sobota', $string);
		$string = str_replace('Sun', 'niedziela', $string);
		$string = str_replace('Jan', 'styczeń', $string);
		$string = str_replace('Feb', 'luty', $string);
		$string = str_replace('Mar', 'marzec', $string);
		$string = str_replace('Apr', 'kwiecień', $string);
		$string = str_replace('May', 'maj', $string);
		$string = str_replace('Jun', 'czerwiec', $string);
		$string = str_replace('Jul', 'lipiec', $string);
		$string = str_replace('Aug', 'sierpień', $string);
		$string = str_replace('Sep', 'wrzesień', $string);
		$string = str_replace('Oct', 'październik', $string);
		$string = str_replace('Nov', 'listopad', $string);
		$string = str_replace('Dec', 'grudzień', $string);

		return $string;
	});
?>