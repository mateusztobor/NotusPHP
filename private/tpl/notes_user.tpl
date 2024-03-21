<form action="<?php print(Flight::get('app.url').Flight::get('app.path.notes')); ?>" method="post">
	<div class="mb-3 row">

		<div class="col-sm">
			<select class="form-control" name="post_share">
				<option value="1"><?php print(Flight::get('lang.share_all')); ?></option>
				<option value="0"><?php print(Flight::get('lang.not_share')); ?></option>
			</select>
		</div>
		<div class="col-sm">
			<input class="form-control" placeholder="Tytuł notatki" name="post_title" value="" name="post_title">
		</div>
		<div class="col-sm">
			<select class="form-control" name="post_category">
				<?php print(Flight::get('notes_categories')); ?>
			</select>
		</div>
	</div>

	<div class="text-center">
			<?php print(Flight::get('notify')); ?>
			<textarea id="notes" class="form-control col-xs-12" name="post_notes"></textarea>
			<button type="submit" class="btn btn-secondary"><img src="<?php print(Flight::get('app.url')); ?>public/img/icon.png" style="width:24px;margin-top:-5px;" alt=""> <?php print(Flight::get('lang.notes_save_button')); ?></button>
	</div>


</form>