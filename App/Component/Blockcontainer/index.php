<?php if (isset($header)): ?>
<nav>
    <div class="container">
        <?= getWidjet("header",$header) ?>
    </div>
</nav>
<?php endif ?>
<?php if(isset($content)): ?>
    <?php foreach($content as $keys => $values): ?>
            <?= getWidjet("section" , $values) ?>
    <?php endforeach; ?>
<?php endif; ?>