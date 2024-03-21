<?php
	class login_controller{
		public function view() {
			Flight::set('app.path.login.a',true);
			$this->form();
			Flight::render('main', array('title' => Flight::get('lang.guest_login_title'), 'tpl'=>'login'));
		}
		
		private function form() {
			$err=false;
			if(isset($_POST['post_email']) && isset($_POST['post_password'])) {
				Flight::db_open();
				$count = Flight::db()->querySingle('SELECT COUNT(*) as count FROM users WHERE email="'.strtolower($_POST['post_email']).'";');
				if($count == 1) {
					$pass = Flight::db()->querySingle('SELECT password FROM users WHERE email="'.strtolower($_POST['post_email']).'";');
					if(password_verify($_POST['post_password'], $pass)) {
						$uid = Flight::db()->querySingle('SELECT id FROM users WHERE email="'.strtolower($_POST['post_email']).'";');
						Flight::register_session($uid);
					} else $err=true;
				} else $err=true;
			}
			if($err)
				Flight::set('notify',Flight::get('lang.guest_login_error'));
		}
	}