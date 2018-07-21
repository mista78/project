<?php 
	
	$md6 = ['tags' => 'p', 'class' => 'col-md-6 col-xs-6'];
	$md12 = ['tags' => 'p', 'class' => 'col-md-12'];

?>
<!DOCTYPE html>
<html>
	<head>
		<title><?= $conf['config']['title'] ?? 'Devlife' ?> | Maintenance</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
		<meta charset="utf-8">
		<?= link_style(['file' => 'css/style']) ?>
		<?= link_style(['file' => 'css/maint']) ?>
	</head>
	<body>
		<div class="bgimg" style="background-image: url('<?= Webroot("img/maint/" . ($conf['config']['img'] ?? "maintenance.jpg")) ?>');">
			<div class="middle">
				<h1><?= @$conf['config']['name_maintenance'] ?? "Coming soon" ?></h1>
				<hr>
				<?php if (isset($conf['config']['content']) &&  $conf['config']['content'] != ''): ?>
					<h5><?= @$conf['config']['content'] ?></h5>
				<?php endif ?>
				<?php if (isset($conf['config']['created']) &&  $conf['config']['created'] != ''): ?>
					<p id="demo" style="font-size:30px"></p>
				<?php endif ?>
			</div>
			<div class="bottomleft">
			    <p><a class="bt" href="<?= Url('users/login') ?>" style="color: #fff"><i class="fas fa-fw fa-lock"></i></a></p>
			</div>
			<div id="sidebar" class="sidebar right">
				<div class="panel">
					<div class="panel-body">
						<div class="container">
							<div class="row">
							<?= FormStart(['action' => 'users/login','enctype' => 'multipart/form-data']) ?>
								<?= tags(input('pseudo'," ",['class' => 'form-control']),$md12) ?>
								<?= tags(input('password'," ",['type' => 'password','class' => 'form-control']),$md12) ?>
								<?= tags(submit("Se connecter",['class' => 'btn btn-primary m-t-10 btn-block']),$md6) ?>
								<?= tags(submit("X",['class' => 'btn close btn-primary m-t-10 btn-block']),$md6) ?>
							<?= FormEnd() ?>
						</div>
						</div>
					</div>
				</div>
			</div>	
			<div class="cover"></div>	
		</div>
		
		<?= link_script(['src' => '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min']) ?>
		<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
		<script>

		const log = n => console.log(n)
        const btn = document.querySelectorAll('.bt')	
        const body = document.querySelector('.close')	
        const resume = document.querySelectorAll('#sidebar')
        const hide = () => {
        	resume.forEach((e) => {
       			e.style.transform = "translateX(" +  e.offsetWidth + "px)"
       			e.style.height = e.offsetHeight = "px"
       		})
        }
       	hide();
        btn.forEach((item) => {
          log(item)
        	item.addEventListener('click', (e) => {
        		e.preventDefault()
        		const btnId = document.querySelector("#sidebar")
        		
        		log(btnId)
        		resume.forEach((e) => {
        			e.classList.remove('active')
        		})

        		btnId.classList.add('active')
        		btnId.style.transform = "translateX(0px)"
        	})
        })

        body.addEventListener('click' , (e) => {
        	e.preventDefault()
        	hide()
        })
		// Set the date we're counting down to
		var countDownDate = new Date("<?= @$conf['config']['created'] ?? "2019-05-16" ?>").getTime();
		dated()
		// Update the count down every 1 second
		var countdownfunction = setInterval(dated, 1000);
		function dated () {
			var now = new Date().getTime();
			
			// Find the distance between now an the count down date
			var distance = countDownDate - now;
			
			// Time calculations for days, hours, minutes and seconds
			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);
			
			// Output the result in an element with id="demo"
			document.getElementById("demo").innerHTML = `<span>${days} <br> Jours </span> : <span>${hours} <br> Heures </span> :
				<span>${minutes} <br> Minutes </span> :
				<span>${seconds} <br> Seconds </span> 

			`;
			
			// If the count down is over, write some text
			if (distance < 0) {
				clearInterval(countdownfunction);
				document.getElementById("demo").innerHTML = "EXPIRED";
			}
		}
		</script>
	</body>
</html>