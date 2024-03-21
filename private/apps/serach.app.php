<?php
	if(isset($_GET['s']) && isset($_GET['s_id'])) {
		Flight::redirect(Flight::get('app.url').$_GET['s_id']);
	}