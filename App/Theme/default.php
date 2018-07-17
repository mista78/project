<!DOCTYPE html>
<html>
	<head>
		<title><?= $conf['config']['title'] ?? 'Devlife' ?> | <?= $request['request']['controller'] ?></title>
		<?= HtmlStart([
			'html' => 'meta', 
			'name' => 'viewport' ,  
			'content' => 'width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'
		]) ?>
		<?= link_style(['src' => '//cdn.wysibb.com/css/default/wbbtheme']) ?>
		<?= link_style(['file' => 'css/style']) ?>
		<?= link_script(['src' => '//www.google.com/recaptcha/api']) ?>
	</head>
	<body>
		<div class="site-pusher ">
			<header class="header">
				<a href="#" class="header__icon" id="header__icon"></a>
				<a href="" class="header__logo">Devlie</a>
				<nav class="menu effect">
					<a href="/">accueil</a>
				</nav>

				<div class="menu menu-right ">
					<?php if (isset($_SESSION['User'])): ?>
		                <?php if ($_SESSION['User']['rang'] >= 3): ?>
			                <a href="<?= url('devlife/gestion/index') ?>">Dashboard</a>
			            <?php endif ?>
		                <a href="<?= url('users/logout') ?>">Deconnexion</a>
		            <?php else: ?>
		              	
		            <?php endif ?>
				</div>
			</header>
			<div class="site-content">
				<?= $content ?>
				<footer>
					<div class="container">
						&copy; <?= date('Y') ?> - Devlie
					</div>
				</footer>
			</div>
			<div class="site-cache" id="site-cache"></div>
		</div>
	</body>
	<?= link_script(['src' => '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min']) ?>
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
	<?= link_script(['src' => '//cdn.wysibb.com/js/jquery.wysibb.min']) ?>
	<?= link_script(['file' => 'js/slider']) ?>
	<?= link_script(['file' => 'js/progbar']) ?>
	<script type="text/javascript">

		progressBar.init();
		let onReady = function () {

			if (document.querySelector('#carousel1')) {
				Carousel.init( document.querySelector('#carousel1'), {
					
					slidesVisible: <?= (isset($conf['config']['slideVisibl']) && $conf['config']['slideVisibl'] != '') ? $conf['config']['slideVisibl'] : 1 ?>,
					slidesToScroll: <?= (isset($conf['config']['slideScroll']) && $conf['config']['slideScroll'] != '') ? $conf['config']['slideScroll'] : 1 ?>,
					height: 600,
					infinit: true,
					pagination: true

				})
			}

		}

		if (document.readyState !== 'loading') {
			onReady()
		}
		document.addEventListener('DOMContentLoaded', onReady)
		$(document).ready(function() {
			$("#header__icon,#site-cache").click(function(e){
				e.preventDefault()
				$('body').toggleClass('with--sidebar')
			})
		    var wbbOpt = {
		        buttons: "bold,italic,underline,|,justifyleft,bullist,justifycenter,justifyright,|,img,link,|,code,quote",
		        allButtons: {
		            code: {
		                transform: {
		                '<div class="quote">{SELTEXT}</div>':'[code]{SELTEXT}[/code]',
		                '<div class="quote"><cite>{AUTHOR} wrote:</cite>{SELTEXT}</div>':'[code={AUTHOR}]{SELTEXT}[/code]'
		                }
		            }
		        }
		    }
		    $("#text-editor").css("height","150px");
			$("#text-editor").wysibb(wbbOpt);
			
			document.querySelectorAll(".box-comment-reply").forEach((bxc) => {
				bxc.addEventListener('click', function (e) {
					e.preventDefault()
					const form  	= document.querySelector("#form-comment")
					const inputID 	= document.querySelector("#inputParent_id")
					const parent	= this.parentNode
					const parent_id	= this.dataset.id
					const child		= parent.children
					
					form.children[0].innerHTML = "Répondre à ce commentaire"
					inputID.value = parent_id
					child[1].after(form)
				})
			})
		})

	</script>
</html>