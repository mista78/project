<div class="panel panel-default">
	<div class="panel-body">
		<?= FormStart(['enctype' => 'multipart/form-data']) ?>
			<?= tags(input('name',null,['class' => 'form-control']),['tags' => 'p']) ?>
			<?= tags(input('created',null,['type' => 'datetime','class' => 'form-control datepicker']),['tags' => 'p']) ?>
			<?= tags(select('id_cat',null,['class' => 'form-control','options' => $options]),['tags' => 'p']) ?>
			<?= tags(input('file',null,['type' => 'file']),['tags' => 'p']) ?>
			<?= tags(textarea('content',null, ['id' => 'text-editor']),['tags' => 'p']) ?>
			<?= tags(checkbox('online', null, ['message' => 'publier']),['tags' => 'p']) ?>
			<?= csrfInput() ?>
			<?= tags(submit('Envoyer'),['tags' => 'p']) ?>
		<?= FormEnd() ?>
	</div>
</div>