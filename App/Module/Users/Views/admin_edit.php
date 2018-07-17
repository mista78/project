<div class="panel panel-default">
	<div class="panel-body">
		<?= FormStart(['enctype' => 'multipart/form-data']) ?>
			<?= input('id',null,['type' => 'hidden'])  ?>
			<?= tags(input('pseudo',null,['class' => 'form-control']),['tags' => 'p']) ?>
			<?= tags(input('created',null,['type' => 'datetime','class' => 'form-control datepicker']),['tags' => 'p']) ?>
			<?= tags(select('rang',null,['class' => 'form-control','options' => $conf['rank']]),['tags' => 'p']) ?>
			<?= tags(input('file',null,['type' => 'file']),['tags' => 'p']) ?>
			<?= csrfInput() ?>
			<?= tags(submit('Envoyer'),['tags' => 'p']) ?>
		<?= FormEnd() ?>
	</div>
</div>