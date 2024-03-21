<?php
	Flight::map('set_lang', function($lang){
		if(file_exists(Flight::get('app.langs_path').$lang.'.lang.php'))
			require Flight::get('app.langs_path').Flight::get('app.lang').'.lang.php';
	});
?>