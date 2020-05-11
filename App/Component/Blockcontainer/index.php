<?php if (isset($header)): ?>
<nav>
    <div class="container">
        <?= getWidjet("navigation",$header) ?>
    </div>
</nav>
<?php endif ?>

<?php if (isset($sidebar)): ?>
<div class="Sidebar">
    <?= getWidjet("navigation",$sidebar) ?>
</div>
<?php endif ?>
<?php if(isset($content)): ?>
	<?php if (isset($request["prefix"]) && $request["prefix"]): ?>
		<div class="wrapperSection">
			<?php foreach($content as $keys => $values): ?>
		            <?= getWidjet("section" , $values) ?>
		    <?php endforeach; ?>	
		</div>
	<?php else: ?>
		<?php foreach($content as $keys => $values): ?>
	            <?= getWidjet("section" , $values) ?>
	    <?php endforeach; ?>
	<?php endif ?>
<?php endif; ?>