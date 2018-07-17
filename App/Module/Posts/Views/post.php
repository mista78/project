<div class="item">
	<div class="item__image" style="height: 300px;background-image: url(<?= Webroot('img/blog/' . $post['img']) ?>);">
		<img src="<?= Webroot('img/blog/' . $post['img']) ?>" alt="">
	</div>
	<div class="item__content" style="top: 0px">
		<div class="test" style="width: 100%;height: 100%;background: rgba(50,50,50,0.5);color: #fff;">
			<h1 style="font-weight: 600"><?= $post['name'] ?></h1>
		</div>
	</div>
</div>
<section style="background:#fff">
	<div class="container">
		<p class="box-text"><?= parser($post['content']) ?></p>
		<hr>
		<h2>(<?= FindCount(['table' => 'comments','conditions' => ['post_id' => $post['id']]]) ?>) Commentaires</h2>
		<hr>
		<?php foreach ($comments as  $comment): ?>
			<?php require "comments.php" ?>
		<?php endforeach ?>
	
		<?php if (isset($_SESSION['User'])): ?>
			<?= FormStart(['action' => Url('posts/comments'),'id' => 'form-comment']) ?>
				<h4>Poster un commentaire</h4>
				<?php $_POST['parent_id'] = 0; ?>
				<?= input('parent_id',null, ['type' => 'hidden']) ?>
				<?= input('post_id',null, ['type' => 'hidden']) ?>
				<?= tags(textarea('content',null, ['id' => 'text-editor']),['tags' => 'p']) ?>
				<?= csrfInput() ?>
				<?= tags(submit('Envoyer'),['tags' => 'p']) ?>
			<?= FormEnd() ?>
		<?php else: ?>
			<p>Vous devez être <a href="<?= Url("users/login") ?>">connecté</a> pour pouvoir poster un commentaire...</p>
		<?php endif ?>
	</div>
</section>