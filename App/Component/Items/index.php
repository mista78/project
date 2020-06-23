<?php (isset($don)) ?  extract($don) : null; ?>
<div class="Items">
	<div class="Items__img">
		<?= getWidjet("responsiveimg" , ["img" => $img]) ?>
	</div>
	<div class="Items__content">
		<?= tag($name, "h3") ?>
		<?= tag($resume, "span") ?>
	</div>
	<div class="Items__footer">
		<div class="tags">
			<span>CSS</span> <span>php</span> <span>html</span>
		</div>
		<div class="time" data-ago="<?= (!empty($created)) ? $created : time() ?>">16 hours ago</div>
	</div>
</div>