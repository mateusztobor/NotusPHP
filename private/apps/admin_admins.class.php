<?php
	class admin_admins_controller {
		public function view() {
			Flight::db_open();
			Flight::set('app.path.admin_admins.a',true);
			$this->receive_form();
			$this->give_form();
			$this->load_admins();
			Flight::render('main', array('title' => Flight::get('lang.user_settings_title'), 'tpl'=>'admin_admins'));
		}
		
		private function load_admins() {
			$admins = '<ul class="list-group">';
			$results = Flight::db()->query('SELECT id,nick FROM users WHERE type=2;');
			while ($row = $results->fetchArray()) {
				$admins .= '<li class="list-group-item"><a onclick="return confirm('.Flight::get('lang.admincp_acceptdo').')" href="'.Flight::get('app.url').Flight::get('app.path.admin_admins').'?receive='.$row['id'].'" class="btn btn-secondary me-5">Odbierz uprawnienia</a> '.$row['nick'].'</li>';
			}
			$admins != "</ul>";
			Flight::set('admins_list',$admins);
		}
		
		private function receive_form() {
			if(isset($_GET['receive'])) {
				Flight::db()->query('UPDATE users SET type=1 WHERE id="'.htmlspecialchars($_GET['receive']).'";');
				Flight::redirect(Flight::get('app.url').Flight::get('app.path.admin_admins'));
				exit();
			}
		}
		
		private function give_form() {
			if(isset($_POST['post_nick'])) {
				Flight::db()->query('UPDATE users SET type=2 WHERE nick="'.htmlspecialchars($_POST['post_nick']).'" OR id="'.htmlspecialchars($_POST['post_nick']).'";');
				Flight::redirect(Flight::get('app.url').Flight::get('app.path.admin_admins'));
				exit();
			}
		}
	}