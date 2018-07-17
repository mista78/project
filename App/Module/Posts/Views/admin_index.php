<div class="container_fluid">
  <div class="row">
    <div class="col-md-4">
      <div class="panel">
        <div class="panel-head no-margin">
          <h4 class="panel-title">
            <i class="fa fa-fw fa-align-left"></i> Catégories
          </h4>
        </div>
        <div class="panel-body">
          <table class="table table-hover">
            <thead>
              <th colspan="2"></th>
              <th class="action"></th>
            </thead>
            <tbody>
              <?php foreach (Find(['table' => 'categories']) as $key => $value): ?>
                <tr>
                  <td class="action text-center"><i class="fa fa-circle" style="color: <?= $value['color'] ?>;"></i></td>
                  <td class="col-md-6"><?= $value['name'] ?></td>
                  <td class="action">
                    <a class="btn btn-default btn-xs" href="<?= url('devlife/posts/editCat/id:'. $value['id'] ) ?>">
                      <i class="fas fa-fw fa-pencil-alt"></i>
                    </a> 
                    <a class="btn btn-default btn-xs" href="<?= url('devlife/posts/delete/categories/'. $value['id'] . csrf()) ?>">
                      <i class="fas fa-fw fa-times"></i>
                    </a>
                  </td>
                </tr> 
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <div class="panel-footer text-center">
          <a href="<?= url("devlife/categories/edit") ?>" class="btn btn-default">
            <i class="fas fa-fw fa-plus"></i>
            Créer une catégorie
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="panel">
        <div class="panel-head no-margin">
          <h4 class="panel-title">
            <i class="fas fa-fw fa-file"></i> Liste des actualités
          </h4>
        </div>
        <div class="panel-body">
          <table class="table table-hover">
            <thead>
              <th class="action"></th>
              <th>Titre</th>
              <th>Categorie</th>
              <th>Auteur</th>
              <th class="action"><i class="fas fa-fw fa-comments"></i></th>
              <th class="action col-md-3"></th>
            </thead>
            <tbody>
              <?php foreach ($posts as $key => $value): ?>
              <tr>
                <td>
                  <i class="fa fa-circle" style="color: <?= ternaire([
                        'data' => [
                          '-1'  => '#800000',
                          '0'   => '#ff8000',
                          '1'   => '#7bbb17',
                        ],
                        'value' => $value['online']
                      ]); ?>;"></i>
                </td>
                <td class="col-md-8" ><?= $value['name'] ?></td>
                <td ><?= ucfirst($value['catname']) ?></td>
                <td><?= ucfirst($value['pseudo']) ?></td>
                <td class="action text-center">0</td>
                <td class="hidden-xs action">
                  <a class="btn btn-default btn-xs" href="<?= url('devlife/posts/edit/'. $value['id'] ) ?>"><i class="fas fa-pencil-alt"></i></a> 
                  <a class="btn btn-default btn-xs" href="<?= url('devlife/posts/delete/posts/'. $value['id'] . csrf()) ?>"><i class="fas fa-fw fa-times"></i></a>
                </td>
              </tr>
            <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <div class="panel-footer text-center">
          <a href="<?= url('devlife/posts/edit/') ?>" class="btn btn-default">
            <i class="fas fa-fw fa-plus"></i>
             Ajouter une actualité
          </a>
        </div>
      </div>
    </div>
  </div>
</div>