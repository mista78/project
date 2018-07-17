<section>

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="panel">
				<div class="panel-head">
					<h3 class="panel-title">
						<i class="fa fa-fw fa-user"></i>
						Connexion
					</h3>
				</div>
				<div class="panel-body">
					<?= FormStart(['action' => url('users/login'),'class' => '']) ?>
							
						<?=
							tags(
								tags(
									tags(
										tags(null,['tags' => 'i', 'class' => 'fas fa-fw fa-user']),
										['tags' => 'span', 'class' => 'input-group-addon']
									) .
									input('pseudo',null,['placeholder' => 'identifiant','class' => 'form-control form-control-secondary'])
									,
									['tags' => 'div', 'class' => 'input-group']
								)
								,
								['tags' => 'div','class' => 'form-group m-b-10']
							)
						?>
						
						<?=
							tags(
								tags(
									tags(
										tags(null,['tags' => 'i', 'class' => 'fas fa-fw fa-lock']),
										['tags' => 'span', 'class' => 'input-group-addon']
									) .
									input('password',null,['placeholder' => 'Mot de passe','type' => 'password','class' => 'form-control form-control-secondary'])
									,
									['tags' => 'div', 'class' => 'input-group']
								)
								,
								['tags' => 'div','class' => 'form-group m-b-10']
							)
						?>
						
						<?= submit("Se connecter",['class' => 'btn btn-primary m-t-10 btn-block']) ?>
					<?= FormEnd() ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel">
				<div class="panel-head">
					<h3 class="panel-title">
						<i class="fa fa-fw fa-sign-in fa-rotate-90"></i>
						Pas encore inscrit ?
					</h3>
				</div>
				<div class="panel-body">
					<?= FormStart(['action' => url('users/register')]) ?>
						<?=
							tags(
								tags(
									tags(
										tags(null,['tags' => 'i', 'class' => 'fas fa-fw fa-user']),
										['tags' => 'span', 'class' => 'input-group-addon']
									) .
									input('pseudo',null,['placeholder' => 'identifiant','class' => 'form-control form-control-secondary'])
									,
									['tags' => 'div', 'class' => 'input-group']
								)
								,
								['tags' => 'div','class' => 'form-group m-b-10']
							)
						?>
						<?=
							tags(
								tags(
									tags(
										tags(null,['tags' => 'i', 'class' => 'fas fa-fw fa-lock']),
										['tags' => 'span', 'class' => 'input-group-addon']
									) .
									input('password',null,['placeholder' => 'Mot de passe','type' => 'password','class' => 'form-control form-control-secondary'])
									,
									['tags' => 'div', 'class' => 'input-group']
								)
								,
								['tags' => 'div','class' => 'form-group m-b-10']
							)
						?>
						<?=
							tags(
								tags(
									tags(
										tags(null,['tags' => 'i', 'class' => 'fas fa-fw fa-lock']),
										['tags' => 'span', 'class' => 'input-group-addon']
									) .
									input('password2',null,['placeholder' => 'Confirmation','type' => 'password','class' => 'form-control form-control-secondary'])
									,
									['tags' => 'div', 'class' => 'input-group']
								)
								,
								['tags' => 'div','class' => 'form-group m-b-10']
							)
						?>
						<?=
							tags(
								tags(
									tags(
										tags(null,['tags' => 'i', 'class' => 'far fa-fw fa-envelope']),
										['tags' => 'span', 'class' => 'input-group-addon']
									) .
									input('email',null,['placeholder' => 'Email','type' => 'email','class' => 'form-control form-control-secondary'])
									,
									['tags' => 'div', 'class' => 'input-group']
								)
								,
								['tags' => 'div','class' => 'form-group m-b-10']
							)
						?>
						<?=
							tags(
								tags(
									// tags(
									// 	'<img src="'. WEBROOT. "captcha.php" .'">',
									// 	['tags' => 'span', 'class' => 'input-group-addon']
									// ) .
									isHtml()
									,
									['tags' => 'div', 'class' => 'input-group']
								)
								,
								['tags' => 'div','class' => 'form-group m-b-10']
							)
						?>
						<?= submit("S'enregistrer",['class' => 'btn btn-primary m-t-10 btn-block']) ?>

					<?= FormEnd() ?>
				</div>
			</div>
		</div>
	</div>
</div>	
</section>