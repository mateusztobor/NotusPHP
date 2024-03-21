<?php
	class notes_postview_controller {
		private $id;
		
		public function __construct($id) {
			$this->id = $id;
			Flight::set('notes_post_id',$id);
		}
		
		public function view() {
			Flight::db_open();
			if($this->check_exists()) {
				$this->get_post('author');
				$this->get_post('share');
				if(Flight::get('user.type') > 0 && Flight::get('user.id') == Flight::get('notes_post_author') || Flight::get('user.type') == 2) {
					$this->del_form();
					$this->form();
					$this->get_post('title');
					$this->get_post('content');
					$this->get_post('date');
					Flight::set('notes_post_date', Flight::date_pl(Flight::get('notes_post_date')));
					$this->get_author_name();
					$this->get_categories_list();
					Flight::render('main', array('title' => $this->get_title(), 'tpl'=>'notes_postview_author'));
				}
				elseif(Flight::get('notes_post_share')) {
					$this->get_post('title');
					$this->get_post('content');
					$this->get_post('date');
					Flight::set('notes_post_date', Flight::date_pl(Flight::get('notes_post_date')));
					$this->get_author_name();
					$this->get_category();
					Flight::render('main', array('title' => $this->get_title(), 'tpl'=>'notes_postview'));
				} else {
					Flight::set('notify_title', Flight::get('lang.postview_no_access_title'));
					Flight::set('notify_type', 'danger');
					Flight::set('notify', Flight::get('lang.postview_no_access_content'));
					Flight::render('alert2', array('title' => $this->get_title(), 'tpl'=>'notes_postview'));
				}
			} else {
				Flight::set('notify_title', Flight::get('lang.notes.postview_notexist_title'));
				Flight::set('notify_type', 'danger');
				Flight::set('notify', Flight::get('lang.notes.postview_notexist'));
				Flight::render('alert2', array('title' => $this->get_title(), 'tpl'=>'notes_postview'));
			}
		
		}
		
		private function check_exists() {
			$count = Flight::db()->querySingle('SELECT COUNT(*) as count FROM posts WHERE pin="'.$this->id.'";');
			if($count==1) return true;
			return false;
		}
		
		private function get_title() {
			$title = Flight::db()->querySingle('SELECT title FROM posts WHERE pin="'.$this->id.'";');
			if(empty($title)) return Flight::get('lang.notes.postview_title').$this->id;
			else return Flight::get('lang.notes.postview_title').$title;
		}
		
		private function get_post($what) {
			$content = Flight::db()->querySingle('SELECT '.$what.' FROM posts WHERE pin="'.$this->id.'";');
			if($content) Flight::set('notes_post_'.$what,$content);
		}
		
		private function get_author_name() {
			$set = Flight::db()->querySingle('SELECT nick FROM users WHERE id="'.Flight::get('notes_post_author').'";');
			if($set) Flight::set('notes_post_author_nick',$set);
		}
		
		private function get_category() {
			$this->get_post('category');
			if(!empty(Flight::get('notes_post_category'))) {
				$catName = Flight::db()->querySingle('SELECT title FROM categories WHERE id="'.Flight::get('notes_post_category').'";');
				if($catName) Flight::set('notes_post_category',$catName);
			} else Flight::set('notes_post_category', Flight::get('lang.default_category'));
		}
		
		//AUTHOR
		private function get_categories_list() {
			$this->get_post('category');
			Flight::set('notes_categories', '<option value="">'.Flight::get('lang.default_category').'</option>');
			$results = Flight::db()->query('SELECT id,title FROM categories WHERE user_id = "'.Flight::get('user.id').'";');
			
			while ($row = $results->fetchArray()) {
				Flight::set('notes_categories', Flight::get('notes_categories').'<option value="'.$row['id'].'"'.(Flight::get('notes_post_category') == $row['id'] ? ' selected' : '').'>'.$row['title'].'</option>');
			}
		}
	
		private function form() {
			if(isset($_POST['post_notes']) && isset($_POST['post_share']) && isset($_POST['post_title']) && isset($_POST['post_category'])) {
				if($this->form_valid()) {
					$title = htmlspecialchars($_POST['post_title']);
					$content = htmlspecialchars($_POST['post_notes']);
					$share = (int)(htmlspecialchars($_POST['post_share']));
					if(!empty($_POST['post_category'])) $category = (int)(htmlspecialchars($_POST['post_category']));
					else $category=NULL;
					$this->form_update($title,$content,$category,$share,$this->id,Flight::get('user.id'));
					$this->get_post('share');
				}
			}
		}
	
		private function form_valid() {
			$ok = true;
			
			if(!empty($_POST['post_title'])) {
				if(mb_strlen($_POST['post_title']) > 40) {
					$ok=false;
				}
			}

			if(empty($_POST['post_notes'])) $ok=false;
			
			if(!empty($_POST['post_category'])) {
				if(!$this->check_category(htmlspecialchars($_POST['post_category']))) {
					$ok=false;
				}
			}
			
			if(isset($_POST['post_share'])) {
				if(is_int((int)$_POST['post_share'])) {
					if($_POST['post_share'] != 0 && $_POST['post_share'] != 1) {
						$ok=false;
					}
				} else {
					$ok=false;
				}
			} else {
				$ok=false;
			}
			return $ok;
		}
		
		private function check_category($id) {
			$count = Flight::db()->querySingle('SELECT COUNT(*) as count FROM categories WHERE id="'.$id.'" AND user_id="'.Flight::get('user.id').'";');
			if($count==1) return true;
			return false;
		}
		
		private function form_update($title,$content,$category,$share,$pin,$author) {
			if($category == NULL)
				$sql = 'UPDATE posts SET
							title="'.$title.'",
							content="'.$content.'",
							category=NULL,
							share="'.$share.'",
							date=datetime("now") 
						WHERE pin="'.$pin.'" AND author="'.$author.'";';
			else
				$sql = 'UPDATE posts SET
							title="'.$title.'",
							content="'.$content.'",
							category="'.$category.'",
							share="'.$share.'",
							date=datetime("now") 
						WHERE pin="'.$pin.'" AND author="'.$author.'";';
			return Flight::db()->query($sql);
		}
	
		private function del_form() {
			if(isset($_GET['del'])) {
				if($this->id == $_GET['del']) {
					Flight::db()->query('DELETE FROM posts WHERE pin="'.$this->id.'" AND author="'.Flight::get('user.id').'";');
					Flight::redirect(Flight::get('app.url').Flight::get('app.path.posts'));
					exit();
				}
			}
		}
	}