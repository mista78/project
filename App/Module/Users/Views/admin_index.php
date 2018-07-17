<div class="container_fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-head no-margin">
          <h4 class="panel-title">
            <i class="fas fa-fw fa-file"></i> Liste des utilisateur
          </h4>
        </div>
        <div class="panel-body">
          <table class="table table-hover">
            <thead>
              <th>Pseudo</th>
              <th>Email</th>
              <th class="action"><i class="fas fa-fw fa-comments"></i></th>
              <th>Rank</th>
              <th class="action col-md-3"></th>
            </thead>
            <tbody>
              <?php foreach ($users as $key => $value): ?>
              <tr>
                <td class="col-md-10" ><?= $value['pseudo'] ?></td>
                <td ><?= ucfirst($value['email']) ?></td>
                <td class="action text-center"><?= $value['post'] ?></td>
                <td class="action text-center"><?= $conf['rank'][$value['rang']] ?></td>
                <td class="hidden-xs action">
                  <a class="btn btn-default btn-xs" href="<?= url('devlife/users/edit/'. $value['id'] ) ?>"><i class="fas fa-pencil-alt"></i></a> 
                  <a class="btn btn-default btn-xs" href="<?= url('devlife/users/edit/'. $value['id'] ) ?>"><i class="fas fa-circle"></i></a> 
                  <a class="btn btn-default btn-xs" href="<?= url('devlife/users/delete/'. $value['id'] . csrf()) ?>"><i class="fas fa-fw fa-times"></i></a>
                </td>
              </tr>
            <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>