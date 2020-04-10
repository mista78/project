
<div class="Section <?= isset($class) ? implode(" ", $class) : null  ?>">
	<div class="BlocsContainer <?= (isset($container) && $container === true) ? "wrap" : null ?>" <?= (isset($attribute)) ? attribute($attribute) : null ?>>
		<?php if (isset($item)): ?>
		<?php foreach($item as $keyw => $valuew): ?>
		<div class="flex-bloc <?= isset($valuew['class']) ? implode(" ", $valuew['class']) : null  ?>">
			<?= (isset($valuew['type'])) ? getWidjet($valuew['type'],$valuew) : null ?>
		</div>
		<?php endforeach; ?>
		<?php endif ?>
	</div>
</div>