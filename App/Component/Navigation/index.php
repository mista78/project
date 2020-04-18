<?php if(isset($item)): ?>
<ul>
	<?php foreach ($item as $keyl => $valuel): ?>
	<?= (isset($valuel)) ? getWidjet("menulink",$valuel) : null ?>
	<?php endforeach ?>
</ul>
<?php endif; ?>