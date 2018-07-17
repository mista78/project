<div class="container_fluid">
<div class="panel">
	<div class="panel-body ">
		<?= FormStart(['enctype' => 'multipart/form-data']) ?>
			<?= input('id',null, ['type' => 'hidden']) ?>
			<?= tags(input('name',null,['class' => 'form-control']),['tags' => 'p']) ?>
			<?php // tags(input('color',null,['type' => 'color','class' => '']),['tags' => 'p']) ?>
			<?=
				tags(
					tags(
						tags(
							tags(null,['tags' => 'i', 'class' => 'fa fa-fw fa-square' ,'id' => 'lol']),
							['tags' => 'span', 'id' => 'color', 'class' => 'input-group-addon']
						) .
						input('color',null,['placeholder' => 'identifiant','class' => 'form-control form-control-secondary'])
						,
						['tags' => 'div', 'class' => 'input-group']
					)
					,
					['tags' => 'div','class' => 'form-group m-b-10']
				)
			?>
			<?= tags(submit('Envoyer'),['tags' => 'p' , 'class' => 'form-group']) ?>
		<?= FormEnd() ?>
	</div>
</div>
</div>
