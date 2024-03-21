<?php
	class account_controller {
		public function view() {
			Flight::set('app.path.account.a',true);
			Flight::db_open();
			$this->chpass_form();
			Flight::render('main', array('title' => Flight::get('lang.user_settings_title'), 'tpl'=>'account'));
		}
		
		private function chpass_form() {
			if(isset($_POST['post_password']) && isset($_POST['post_repassword']) && isset($_POST['post_oldpassword'])) {
				
				if($this->valid_chpass_form()) {
					$sql = 'UPDATE users SET password="'.password_hash($_POST['post_password'], PASSWORD_DEFAULT).'" WHERE id='.Flight::get('user.id').';';
					if(Flight::db()->query($sql)) {
						Flight::set('notify', Flight::get('lang.user_settings_chpass_success'));
						Flight::set('notify_type','success');
					} else {
						Flight::set('notify', Flight::get('lang.guest_register_password_secure_error'));
						Flight::set('notify_type','warning');
					}
				} else Flight::set('notify_type','warning');
			}
			
		}
		
		private function valid_chpass_form() {
			$ok=true;
			if($this->check_old_password($_POST['post_oldpassword'])) {
				if(!empty($_POST['post_password'])) {
					if($_POST['post_password'] === $_POST['post_repassword']) {
						$uppercase = preg_match('@[A-Z]@', $_POST['post_password']);
						$lowercase = preg_match('@[a-z]@', $_POST['post_password']);
						$number    = preg_match('@[0-9]@', $_POST['post_password']);
						$specialChars = preg_match('@[^\w]@', $_POST['post_password']);
						if(
							!$uppercase ||
							!$lowercase ||
							!$number ||
							!$specialChars ||
							mb_strlen($_POST['post_password']) < 6
						) {
							Flight::set('notify', Flight::get('lang.guest_register_password_secure_error'));
							$ok=false;
						}
					} else {
						Flight::set('notify', Flight::get('lang.guest_register_password_not_match'));
						$ok=false;
					}
				} else {
					Flight::set('notify', Flight::get('lang.guest_register_not_isset_password'));
					$ok=false;
				}
			} else {
				Flight::set('notify', Flight::get('lang.user_settings_chpass_old_pass_error'));
				$ok=false;
			}
			return $ok;
		}
		
		private function check_old_password($input) {
			$pass = Flight::db()->querySingle('SELECT password FROM users WHERE id="'.Flight::get('user.id').'";');
			return password_verify($input, $pass);
		}
		
		
	}