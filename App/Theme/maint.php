<!DOCTYPE html>
<html>
	<head>
		<title><?= $conf['config']['title'] ?? 'Devlife' ?> | Maintenance</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
		<meta charset="utf-8">
	</head>
	<?= link_style(['file' => 'css/maint']) ?>
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