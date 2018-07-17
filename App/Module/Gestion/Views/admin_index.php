<div class="container_fluid">
  <?php foreach ($data as $key => $val): ?>
  <div class="row">
      <?php foreach ($val as $key => $value): ?>
      <div class="col-md-<?= ceil(12 / count($val)) ?>">
        <div class="cards cards-<?= $value['colors'] ?>">
          <div class="cards-icons">
            <?= fa(['name' => $value['fa']]) ?>
          </div>
          <div class="cards-stats">
            <h3><?= $value['data'] ?></h3>
            <p><?= ucfirst($value['name']) ?></p>
          </div>
        </div>
      </div>
      <?php endforeach ?>
  </div>
  <?php endforeach ?>
  <div class="row">
    <div class="col-md-12">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi provident magnam facere perspiciatis blanditiis nemo inventore quas laborum aliquid quam! Porro numquam provident non nesciunt, necessitatibus perspiciatis at animi dolores.
    </div>
  </div>
</div>