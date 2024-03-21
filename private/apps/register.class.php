<?php
	class register_controller{
		
		public function view() {
			Flight::set('app.path.register.a',true);
			$this->form();
			Flight::render('main', array('title' => Flight::get('lang.guest_register_title'), 'tpl'=>'register'));
		}
		
		private function form() {
			if(isset($_POST['post_email']) && isset($_POST['post_nick']) && isset($_POST['post_password']) && isset($_POST['post_repassword'])) {
				Flight::db_open();
				if($this->valid_form()) {
					if($this->create_account()) {
						Flight::set('notify_type','success');
						$this->add_notify('guest_register_success');
						unset($_POST);
					} else {
						Flight::set('notify_type','warning');
						$this->add_notify('guest_register_unknown_error');
					}
				} else Flight::set('notify_type','warning');
			}
		}
		
		private function add_notify($notify) {
			Flight::set('notify', Flight::get('notify').'<li>'.Flight::get('lang.'.$notify).'</li>');
		}
		
		private function check_nick_unique($nick) {
			$count = Flight::db()->querySingle('SELECT COUNT(*) as count FROM users WHERE nick="'.$nick.'";');
			if($count > 0) return false;
			return true;
		}
		
		private function check_email_unique($mail) {
			$count = Flight::db()->querySingle('SELECT COUNT(*) as count FROM users WHERE email="'.$mail.'";');
			if($count > 0) return false;
			return true;
		}
		
		private function valid_form() {
			$ok = true;
			
			//check mail
			if(!empty($_POST['post_email'])) {
				if(filter_var($_POST['post_email'], FILTER_VALIDATE_EMAIL)) {
					if(!$this->check_email_unique($_POST['post_email'])) {
						$ok = false;
						$this->add_notify('guest_register_not_unique_email');
					}
				} else {
					$ok = false;
					$this->add_notify('guest_register_invalid_email');
				}
			} else {
				$ok = false;
				$this->add_notify('guest_register_not_isset_email');
			}
			
			//check password
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
						$ok = false;
						$this->add_notify('guest_register_password_secure_error');
					}
					
				} else {
					$ok = false;
					$this->add_notify('guest_register_password_not_match');
				}
			} else {
				$ok = false;
				$this->add_notify('guest_register_not_isset_password');
			}
			
			//check nick
			if(!empty($_POST['post_nick'])) {
				if(mb_strlen($_POST['post_nick']) >= 3 && mb_strlen($_POST['post_nick']) <= 15) {
					if(!$this->check_nick_unique(htmlspecialchars($_POST['post_nick']))) {
						$ok = false;
						$this->add_notify('guest_register_not_unique_nick');
					}
				} else {
					$ok = false;
					$this->add_notify('guest_register_nick_not_pass');
				}
			} else {
				$ok = false;
				$this->add_notify('guest_register_not_isset_nick');	
			}
			return $ok;
		}
		
		private function create_account() {
			$sql = 'INSERT INTO users(nick,email,password) VALUES("'.htmlspecialchars($_POST['post_nick']).'","'.strtolower($_POST['post_email']).'","'.password_hash($_POST['post_password'], PASSWORD_DEFAULT).'")';
			return Flight::db()->query($sql);
		}
	}