<div id="carousel1">
	<?php foreach ($slider as $key => $post): ?>
	<div class="item">
		<div class="item__image" style="background: linear-gradient(to bottom, rgba(0,0,0,0) 70%, rgba(0,0,0,1) 100%),url(<?= Webroot('img/blog/' . $post['img']) ?>);">
			<img src="<?= Webroot('img/blog/' . $post['img']) ?>" alt="">
		</div>
		<div class="item__content">
			<div class="test" style="width: 100%;height: 100%;background: rgba(50,50,50,0.5);color: #fff;">
				<h1><?= $post['name'] ?></h1>
				<p class="box-text"><?= Truncate(parser($post['content']),['size' => 350]) ?></p>
			</div>
		</div>
	</div>
	<?php endforeach ?>
</div>
<section >
	
	<div class="container">
		
		<div class="row">
				
			<?php foreach ($posts as $key => $post): ?>
			<div class="col-md-4">
				<a href="<?= Url("posts/post/". $post['slug']) ?>">
					<div class="box">
						<div class="box-image">
							<div class="image" style="background-image: url(<?= Webroot('img/blog/' . $post['img']) ?>);">
								<img src="<?= Webroot('img/blog/' . $post['img']) ?>" alt="">
							</div>
						</div>
						<div class="box-body">
							<h3><strong><?= Truncate($post['name']) ?></strong></h3>
							<p class="box-text"><?= Truncate(parser($post['content']),['size' => 200]) ?></p>
							<hr>
						</div>
					</div>
				</a>
			</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
