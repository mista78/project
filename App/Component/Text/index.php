<div class="Text <?= isset($class) ? implode(" ", $class) : null  ?>">
	<?= isset($title) ? tag($title, "h1") : null ?>
	<?= isset($text) ? tag($text, "p") : null ?>
</div>