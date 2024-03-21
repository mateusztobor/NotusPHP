<?php
	class admin_dashboard_controller {
		public function view() {
			Flight::db_open();
			$this->load_stats();
			Flight::set('app.path.admin_dashboard.a',true);
			Flight::render('main', array('title' => Flight::get('lang.admincp_dashboard_title'), 'tpl'=>'admin_dashboard'));
		}
		
		private function load_stats() {
			Flight::set('count_users', Flight::db()->querySingle('SELECT COUNT(*) as count FROM users;'));
			Flight::set('count_posts', Flight::db()->querySingle('SELECT COUNT(*) as count FROM posts;'));
			Flight::set('count_posts_users', Flight::db()->querySingle('SELECT COUNT(*) as count FROM posts WHERE author IS NOT NULL;'));
			Flight::set('count_posts_guests', Flight::db()->querySingle('SELECT COUNT(*) as count FROM posts WHERE author IS NULL;'));
			
			$dbsize = filesize(Flight::get('db.path'));
			$dbsize = round($dbsize / 1024, 2);
			Flight::set('db_size', $dbsize);
			
			$lastaddedpost = Flight::db()->querySingle('SELECT pin FROM posts ORDER BY id DESC LIMIT 1;');
			if($lastaddedpost) {
				Flight::set('last_added_post', $lastaddedpost);
				$lastaddedpost_date = Flight::db()->querySingle('SELECT date FROM posts ORDER BY id DESC LIMIT 1;');
				Flight::set('last_added_post_date', Flight::date_pl($lastaddedpost_date));
			} else Flight::set('last_added_post_date', 'no data');
			
			$lastmodifiedpost = Flight::db()->querySingle('SELECT pin FROM posts ORDER BY "date" DESC LIMIT 1;');
			if($lastmodifiedpost) {
				Flight::set('last_modified_post', $lastmodifiedpost);
				$lastmodifiedpost_date = Flight::db()->querySingle('SELECT date FROM posts ORDER BY "date" DESC LIMIT 1;');
				Flight::set('last_modified_post_date', Flight::date_pl($lastmodifiedpost_date));
			} else Flight::set('last_modified_post_date', 'no data');
		}
	}