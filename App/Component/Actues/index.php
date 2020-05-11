<?php if (isset($text)): ?>
	<?= getWidjet("text",$text) ?>
<?php endif ?>
<div class="Actues">
	<?php if (isset($data)): ?>
		<?php foreach ($data as $key => $value): ?>
			<?php if ($value["created"] < time()): ?>
				<?= getWidjet("items",$value) ?>
			<?php endif ?>
		<?php endforeach ?>
	<?php endif ?>
</div>