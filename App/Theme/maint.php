<!DOCTYPE html>
<html>
	<head>
		<title><?= $conf['config']['title'] ?? 'Devlife' ?> | Maintenance</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
		<meta charset="utf-8">
	</head>
	<style>
	body, html {
	height: 100%;
	margin: 0;
	font-family: 'Open Sans', sans-serif;
	}
	.bgimg {
		background-image: url('<?= Webroot("img/maint/" . ($conf['config']['img'] ?? "maintenance.jpg")) ?>');
		height: 100%;
		background-position: center;
		background-size: cover;
		position: relative;
		color: white;
		font-family: 'Roboto', sans-serif;
		font-size: 25px;
	}
	.topleft {
		position: absolute;
		top: 0;
		left: 16px;
	}
	.bottomleft {
		position: absolute;
		bottom: 0;
		right: 16px;
		z-index: 500;
	}
	.middle {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		text-align: center;
		z-index: 500;
	}
	hr {
		border: 0.5px solid rgba(255,255,255, 0.3);
		margin: auto;
		width: 40%;
	}
	.cover {
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		right: 0;

		background: rgba(0,0,0, 0.5);
	}
	#demo span {
		display: inline-block;
	}
	</style>
	<body>
		<div class="bgimg">
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
			    <p><a href="<?= Url('users/login') ?>" style="color: #fff"><i class="fas fa-fw fa-lock"></i></a></p>
			</div>
			<div class="cover"></div>	
		</div>
		<?= link_script(['src' => '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min']) ?>
		<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
		<script>
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