<!DOCTYPE html>
<html>
	<head>
		<title><?= $conf['config']['title'] ?> | Maintenance</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" type="text/css" media="screen" charset="utf-8">
		<?= link_script(['src' => '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min']) ?>
		<?= link_style(['file' => 'css/style']) ?>
		<script type="text/javascript">
		(function($){
			$.fn.Center= function(){
				this.css({
					'position' : 'fixed',
					'left' :'50%',
					'top' :'50%'
				});
				this.css({
					'margin-left': -this.width()/2 + 'px',
					'margin-top' : -this.height()/2 + 'px'
				});
			};
		})(jQuery);
		
		$(document).ready(function(){
			$('#content').Center();
		});
		</script>
		<style>
			html {
				height: 100%;
			}
			body {
				background-image: url('<?= Webroot("img/maint/" . $conf['config']['img']) ?>');
				height: 100%;
				background-position: center;
				background-size: cover;
				background-repeat: no-repeat;
				position: relative;
				color: white;
				font-family: "Courier New", Courier, monospace;
			}
			.cover {
				position: absolute;
				top: 0;
				bottom: 0;
				left: 0;
				right: 0;

				background: rgba(0,0,0, 0.5);
			}
			#content  {
				position: relative;
				z-index: 500;
			}
		</style>
	</head>
	<body >
		<div id="content" style="width: 300px;">
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
						
						<?= submit("Se connecter",['class' => 'btn btn-primary m-t-10 btn-block','return' => true]) ?>
					<?= FormEnd() ?>
				</div>
			</div>
		</div>
		<div class="cover"></div>
	</body>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
</html>