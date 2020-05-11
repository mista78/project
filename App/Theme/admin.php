<!DOCTYPE html>
<html>
	<head>
		<title>
			Project
		</title>
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="/<?= CompileCss("assets/sass/") ?>">
	</head>
	<body>
		<div class="Admin">
			<?=  getWidjet("blockcontainer",$view); ?>
		</div>
		<script src="/<?= CompileJs() ?>"></script>
	</body>
</html>