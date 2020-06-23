
<div class="Section <?= isset($class) ? implode(" ", $class) : null  ?>">
	<div class="BlocsContainer <?= (isset($container) && $container === true) ? "wrap" : null ?>" <?= (isset($attr)) ? attribute($attr) : null ?>>
		<?php if (isset($item)): ?>
		<?php foreach($item as $keyw => $valuew): ?>
		<div class="flex-bloc <?= isset($valuew['class']) ? implode(" ", $valuew['class']) : null  ?>" <?= (isset($valuew['attr'])) ? attribute($valuew['attr']) : null ?>>
			<?= (isset($valuew['type'])) ? getWidjet($valuew['type'],$valuew) : null ?>
		</div>
		<?php endforeach; ?>
		<?php endif ?>
	</div>
</div>