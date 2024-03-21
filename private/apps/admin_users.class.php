<?php
	class admin_users_controller {
		public function view() {
			Flight::db_open();
			Flight::set('app.path.admin_users.a',true);
			$this->del_form();
			Flight::render('main', array('title' => Flight::get('lang.admincp_users_title'), 'tpl'=>'admin_users'));
		}
		
		private function del_form() {
			if(isset($_POST['post_nick'])) {
				Flight::db()->query('DELETE FROM users WHERE nick="'.htmlspecialchars($_POST['post_nick']).'" OR id="'.htmlspecialchars($_POST['post_nick']).'";');
				Flight::redirect(Flight::get('app.url').Flight::get('app.path.admin_users'));
				exit();
			}
		}
	}