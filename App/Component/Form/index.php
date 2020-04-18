<?php if($form): ?>
<div class="Form">
    <form action="<?= (isset($form['action'])) ? $form['action'] : "" ?>" method="POST" enctype="multipart/form-data">
        <?php foreach($form as $rk => $rv): ?>
        <div class="row">
            <?php foreach($rv as $ki => $vi): ?>
                    <?php   
                        $vi['label'] = isset($vi['label']) ? $vi['label'] : null;   
                        $vi['options'] = isset($vi['options']) ? $vi['options'] : [];   
                    ?>
            <div class="<?= isset($vi['class']) ? implode(" ", $vi['class']) : "col-md-12"  ?>">
                <?= (isset($vi['type'])) ? $vi['type']($vi['name'], $vi['label'], $vi['options']) : null ?>
            </div>
            <?php endforeach ?>
        </div>
        <?php endforeach ?>
        <div class="row">
            <div class="col-md-12">
                <?= (isset($form['submit'])) ? submit($form['submit']) : submit() ?>
            </div>
        </div>
    </form>
</div>
<?php endif ?>
