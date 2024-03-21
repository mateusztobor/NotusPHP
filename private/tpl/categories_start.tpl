	<h4><?php print(Flight::get('lang.new_category_title')); ?></h4>
	<div class="mb-3 text-start lead"><?php print(Flight::get('lang.categories_add.desc')); ?></div>
	<form method="post" action="<?php print(Flight::get('app.url').Flight::get('app.path.categories')); ?>">
	<div class="notes_category_title notes_category_title_edit" style="cursor:default !important;">
		<div class="catbox catbox_edit">
			<span class="collapse-icon-plus rounded-circle">&nbsp;</span>
			
				<input type="text" name="cat_title" value="" placeholder="<?php print(Flight::get('lang.new_category_name')); ?>" maxlength="40" required>
				<div class="mt-2 ms-5">
					<button class="btn btn-danger" type="submit" name="add"><?php print(Flight::get('lang.add_category')); ?></button>
				</div>
			
		</div>
	</div>
	</form>
</div>
<script>
	$( function() {
		$("#sortable").sortable({
			axis: 'y',
			cursor: "move",
			distance: 5,
			scroll: false
		});
	});
</script>
<div class="shadow p-3 rounded bg-light mt-3">
	<h4 class="text-danger"><?php print(Flight::get('lang.mgmt_categories')); ?></h4>
	<div class="mb-3 text-start lead"><?php print(Flight::get('lang.categories_edit.desc')); ?></div>
	<form method="post" action="<?php print(Flight::get('app.url').Flight::get('app.path.categories')); ?>">
		<div id="sortable">