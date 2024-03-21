<form action="<?php print(Flight::get('app.url').Flight::get('notes_post_id')); ?>" method="post">
	<div class="mb-3 row">

		<div class="col-sm">
			<select id="share" class="form-control" name="post_share" disabled>
				<option value="1"<?php if(Flight::get('notes_post_share') == 1) print('selected'); ?>><?php print(Flight::get('lang.share_all')); ?></option>
				<option value="0"<?php if(Flight::get('notes_post_share') == 0) print('selected'); ?>><?php print(Flight::get('lang.not_share')); ?></option>
			</select>
		</div>
		<div class="col-sm">
			<input id="title" class="form-control" placeholder="Tytuł notatki" name="post_title" value="<?php print(Flight::get('notes_post_title')); ?>" name="post_title" disabled>
		</div>
		<div class="col-sm">
			<select id="category" class="form-control" name="post_category" disabled>
				<?php print(Flight::get('notes_categories')); ?>
			</select>
		</div>
	</div>
	<div class="mt-1 row">
		<div class="col text-start">
			<?php print(Flight::get('lang.last_modified:').Flight::get('notes_post_date')); ?>
		</div>
		<div class="col text-end">
			<?php print(Flight::get('lang.author:').Flight::get('notes_post_author_nick')); ?>
		</div>
	</div>

	<div class="text-center">
		<?php print(Flight::get('notify')); ?>
		<textarea id="notes" class="form-control col-xs-12" name="post_notes" disabled required><?php print(Flight::get('notes_post_content')); ?></textarea>
	
		<a href="<?php print(Flight::get('app.url').Flight::get('app.path.notes')); ?>" class="btn btn-secondary"><?php print(Flight::get('lang.notes.postview_addnew')); ?></a>
		<a target="_blank" href="<?php print(Flight::get('app.url').Flight::get('app.path.txt').'/'.Flight::get('notes_post_id')); ?>" class="btn btn-secondary"><?php print(Flight::get('lang.notes.postview_showtxt')); ?></a>
		<a onclick="copyUrl()" class="btn btn-secondary" id="btncopy"><?php print(Flight::get('lang.notes.postview_copyurl')); ?></a>
		
		<button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal-del-<?php print(Flight::get('notes_post_id')); ?>"><?php print(Flight::get('lang.del_post')); ?></button>
		
		<button id="savechanges" type="submit" class="btn btn-secondary"><?php print(Flight::get('lang.notes_save_changes')); ?></button>
		<button id="editpost" type="button" class="btn btn-secondary"><?php print(Flight::get('lang.notes_edit_post')); ?></button>
	</div>
</form>
<div class="modal fade mt-5" id="modal-del-<?php print(Flight::get('notes_post_id')); ?>" tabindex="-1" aria-labelledby="modal-label-del-<?php print(Flight::get('notes_post_id')); ?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modal-label-del-<?php print(Flight::get('notes_post_id')); ?>"><?php print(Flight::get('lang.post_del_modal_title')); ?></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php print(Flight::get('lang.post_del_modal_desc')); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php print(Flight::get('lang.cancel')); ?></button>
				<a href="<?php print(Flight::get('app.url').Flight::get('notes_post_id')); ?>?del=<?php print(Flight::get('notes_post_id')); ?>" class="btn btn-danger"><?php print(Flight::get('lang.post_del_modal_del')); ?></a>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		
		$("#savechanges").hide();
		$("#editpost").click(function(){            
			$("#notes").removeAttr("disabled");
			$("#share").removeAttr("disabled");
			$("#title").removeAttr("disabled");
			$("#category").removeAttr("disabled");
			$("#editpost").hide();
			$("#savechanges").show();
		});
	});
	
	function copyUrl() {
		$( "#btncopy" )
		.removeClass("btn-danger")
		.addClass("btn-success")
		.text("<?php print(Flight::get('lang.notes.postview_copiedurl')); ?>");
		
		if (!window.getSelection) {
			alert('Please copy the URL from the location bar.');
			return;
		}
		
		const dummy = document.createElement('p');
		dummy.textContent = window.location.href;
		document.body.appendChild(dummy);

		const range = document.createRange();
		range.setStartBefore(dummy);
		range.setEndAfter(dummy);

		const selection = window.getSelection();
		selection.removeAllRanges();
		selection.addRange(range);

		document.execCommand('copy');
		document.body.removeChild(dummy);
	}
</script>