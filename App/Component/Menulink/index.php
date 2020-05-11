<li class="<?= (Url($url) === $requestUrl) ? 'active' : null ?>">
	<a href="<?= isset($url) ? Url($url) : "#" ?>"><?= $name ?></a>
	<?= (isset($section)) ? getWidjet("navigation",$section) : null ?>
</li>