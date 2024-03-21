<div class="shadow p-3 rounded bg-light mt-2 mb-2">
	<div role="button" class="notes_category_title collapsed" data-bs-toggle="collapse" data-bs-target="#collapse_cat_<?php print($cat_id); ?>" aria-expanded="<?php if($cat_id==0) print('false'); else print('true'); ?>" aria-controls="collapse_cat_<?php print($cat_id); ?>">
		<h2 class="catbox"><span class="collapse-icon-minus rounded-circle">-</span><span class="collapse-icon-plus rounded-circle">+</span> <?php print($cat_title); ?></h2>
	</div>
	<div class="collapse" id="collapse_cat_<?php print($cat_id); ?>">