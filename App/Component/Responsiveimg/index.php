<?php 
	$img = (isset($img)) ? $img : FindFirst(["table" => "news", "conditions" => "online > -1"])["img"];
?>
<div class="Responsiveimg">
	<picture>
	  <source media="(min-width: 1601px)" srcset="<?= resizedName($img, 3000) ?>">
	  <source media="(min-width: 981px)" srcset="<?= resizedName($img, 1600) ?>">
	  <source media="(min-width: 601px)" srcset="<?= resizedName($img,980) ?>">
	  <img src="<?= resizedName($img, 601) ?>" alt="">
	</picture>
</div>