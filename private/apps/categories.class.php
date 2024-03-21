<?php
	class categories_controller {
		public function view() {
			Flight::set('app.path.categories.a',true);
			Flight::db_open();
			$this->save_form();
			$this->add_form();
			$this->del_form();
			Flight::render('main_start', array('title' => Flight::get('lang.categories_title'), 'tpl'=>'posts'));
			Flight::render('categories_start', array('title' => Flight::get('lang.categories_title'), 'tpl'=>'posts'));
			$this->posts_list();
			Flight::render('categories_end');
			Flight::render('main_end');
		}
		
		private function posts_list() {
			$results = Flight::db()->query('SELECT * FROM categories WHERE user_id = "'.Flight::get('user.id').'" ORDER BY "order";');
			$i=0;
			while ($row = $results->fetchArray()) {
				Flight::render('categories_category', array('cat_id' => $row['id'], 'cat_title' => $row['title'], 'cat_order' => $row['order'], 'i' => $i));
				++$i;
			}
		}
		
		private function save_form() {
			if(isset($_POST['save']) && isset($_POST['cat'])) {
				$i=1;
				foreach(@$_POST['cat'] as $cat) {
					if(!empty($cat['id']) && !empty($cat['title'])) {
						Flight::db()->query('UPDATE categories SET title="'.htmlspecialchars($cat['title']).'", "order"="'.$i.'" WHERE id="'.htmlspecialchars($cat['id']).'" AND user_id="'.Flight::get('user.id').'";');
						$i++;
					}
				}
			}
		}
		
		private function add_form() {
			if(isset($_POST['add']) && isset($_POST['cat_title'])) {
				if(!empty($_POST['cat_title']) && mb_strlen($_POST['cat_title']) <= 40) {
					$count = Flight::db()->querySingle('SELECT "order" FROM categories WHERE user_id="'.Flight::get('user.id').'" ORDER BY "order" DESC LIMIT 1;');
					if($count) $count++;
					else $count=1;
					Flight::db()->query('INSERT INTO categories ("title","user_id","order") VALUES("'.htmlspecialchars($_POST['cat_title']).'","'.Flight::get('user.id').'","'.$count.'");');
				}
			}
		}
		
		private function del_form() {
			if(isset($_GET['del']) && is_numeric($_GET['del'])) {
				Flight::db()->query('DELETE FROM categories WHERE id="'.htmlspecialchars($_GET['del']).'" AND user_id="'.Flight::get('user.id').'";');
				Flight::redirect(Flight::get('app.url').Flight::get('app.path.categories'));
			}
		}
	}