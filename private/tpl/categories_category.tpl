<div class="notes_category_title notes_category_title_edit ui-state-default px-3 pt-2">
	<div class="catbox catbox_edit">
		<span class="collapse-icon-plus rounded-circle">&nbsp;</span>
		<input type="hidden" name="cat[<?php print($cat_id); ?>][id]" value="<?php print($cat_id); ?>" required>
		<input type="text" name="cat[<?php print($cat_id); ?>][title]" value="<?php print($cat_title); ?>" placeholder="<?php print(Flight::get('lang.title_of_category')); ?>" maxlength="40" required>
		<div class="mt-2 ms-5">
			<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal-del-<?php print($cat_id); ?>"><?php print(Flight::get('lang.del_category')); ?></button>
		</div>
	</div>
</div>

<div class="modal fade mt-5" id="modal-del-<?php print($cat_id); ?>" tabindex="-1" aria-labelledby="modal-label-del-<?php print($cat_id); ?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-label-del-<?php print($cat_id); ?>"><?php print(Flight::get('lang.categories_del_modal_title')); ?></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php print(Flight::get('lang.categories_del_modal_desc')); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php print(Flight::get('lang.cancel')); ?></button>
				<a href="<?php print(Flight::get('app.url').Flight::get('app.path.categories')); ?>?del=<?php print($cat_id); ?>" class="btn btn-danger"><?php print(Flight::get('lang.categories_del_modal_del')); ?></a>
			</div>
		</div>
	</div>
</div>