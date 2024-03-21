<div class="mb-3 text-center lead"><?php print(Flight::get('lang.notes_guest_desc')); ?></div>

<div class="text-center">
	<?php print(Flight::get('notify')); ?>
	<form action="<?php print(Flight::get('app.url').Flight::get('app.path.notes')); ?>" method="post">
		<textarea id="notes"class="form-control col-xs-12" name="post_notes" required></textarea>
		<div><small><?php print(Flight::get('lang.notes.underdesc')); ?></small><div>
		<div class="mt-2">
			<button type="submit" class="btn btn-secondary"><img src="<?php print(Flight::get('app.url')); ?>public/img/icon.png" style="width:24px;margin-top:-5px;" alt=""> <?php print(Flight::get('lang.notes_save_button')); ?></button>
		</div>
	</form>
	
</div>