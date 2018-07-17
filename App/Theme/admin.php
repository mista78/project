<!DOCTYPE html>
<html>
	<head>
		<title><?= $conf['config']['title'] ?> | Administration</title>
		<?= link_style(['src' => '//cdn.wysibb.com/css/default/wbbtheme']) ?>
		<?= link_style(['src' => '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui']) ?>
		<?= link_style(['file' => 'css/admin']) ?>
	</head>
	<body>
	
		<div class="main-sidebar">
			<aside>
				<div class="sidebar-brand"><strong><?= $conf['config']['title'] ?> | Admin</strong></div>
				<ul class="sidebar-menu">
					<li class="menu-header">Admin</li>
						<li><a href="<?= Url("devlife/maintenance/edit/1") ?>"><?= fa(['type' => 'far','name' => 'circle']) ?>Mode maintenance</a></li>
						<li><a href="<?= Url("users/logout") ?>"><?= fa(['type' => 'far','name' => 'circle']) ?>déconnexion</a></li>
					<li class="menu-header">General</li>
					<li><a href="<?= Url("dashboard") ?>"><?= fa(['name' => 'tachometer-alt']) ?>Dashboard</a></li>
					<li><a href="<?= Url() ?>"><?= fa(['name' => 'globe']) ?>Retour aux site</a></li>
					<?php if (isset($_SESSION['User']) && $_SESSION['User']['rang'] > 3): ?>
						<li class="menu-header">Module</li>
						<li>
							<a href="" class="has-dropdown"><?= fa(['name' => 'book']) ?>Contenue </a>
							<ul class="menu-dropdown">
								<li><a href="<?= Url("admin/posts/index") ?>"><?= fa(['type' => 'far','name' => 'circle']) ?>Actualite</a></li>
								<li><a href="<?= Url("admin/users/index") ?>"><?= fa(['type' => 'far','name' => 'circle']) ?>Utilisateur</a></li>
								<li><a href="<?= Url("admin/events/index") ?>"><?= fa(['type' => 'far','name' => 'circle']) ?>Evenement</a></li>
							</ul>
						</li>
					<?php endif ?>
					
				</ul>
			</aside>
		</div>
		<div class="main-content">
		<?php if ($conf['mtn'] == 1): ?>
			<div class="container_fluid">
			
				  <div class="row">
				    <div class="col-md-12">
				        <div class="cards cards-warning">
				          <div class="cards-icons ">
				            <?= fa(['name' => 'tachometer-alt']) ?>
				          </div>
				          <div class="cards-stats">
				            Le mode maintenance et actif
				          </div>
				        </div> 
				        <br>
				    </div>
				  </div>
			</div>
			<?php endif ?>
			<?= $content ?>
			</div>
		</div>
	</body>
	<?= link_script(['src' => '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min']) ?>
	<?= link_script(['src' => '//cdn.wysibb.com/js/jquery.wysibb.min']) ?>
	<?= link_script(['src' => '//code.jquery.com/ui/1.12.1/jquery-ui']) ?>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
	<?= link_script(['file' => 'js/admin']) ?>
</html>