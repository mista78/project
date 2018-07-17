<div class="box-comment" id="comment-<?= $comment->id; ?>">
	<div class="box-comment-avatar" style="background-image: url(<?= Webroot("img/blog/40797-wordpress-themes-website-templates.png") ?>);">
		
	</div>
	<div class="box-comment-content">
		<?php if($comment->depth < 1): ?>
            <button class="box-comment-reply" data-id="<?= $comment->id; ?>"><?= fa(['name' => 'reply']) ?></button>
    	<?php else: ?>
            <button class="box-comment-reply" data-id="<?= $comment->parent_id; ?>"><?= fa(['name' => 'reply']) ?></button>
        <?php endif; ?>
		<div><?= parser($comment->content) ?></div>
	</div>
</div>
	
<?php if (isset($comment->children)): ?>
	<?php $comment->children =  array_reverse($comment->children) ?>
	<ul class="box-reply">
	<?php foreach ($comment->children as $key => $comment): ?>
		<li>
			<?php require "comments.php" ?>
		</li>
	<?php endforeach ?>
	</ul>
<?php endif ?>