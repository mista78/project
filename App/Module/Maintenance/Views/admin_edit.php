<div class="container_fluid">
	<div class="panel panel-default">
		<div class="panel-body">
			<?= FormStart(['enctype' => 'multipart/form-data']) ?>
				<?= input('id',null,['type' => 'hidden'])  ?>
				<?= tags(input('title',"Titre du site",['class' => 'form-control']),$md12) ?>
				<?= tags(input('slideScroll',"Nombre de slides scroll",['class' => 'form-control']),$md6) ?>
				<?= tags(input('slideVisibl',"Nombre de slides visible",['class' => 'form-control']),$md6) ?>
				<?= tags(input('secret',"Captcha secret key",['class' => 'form-control']),$md6) ?>
				<?= tags(input('site',"Captcha key site",['class' => 'form-control']),$md6) ?>
				<?= tags(input('cache',"systheme de cache",['class' => 'form-control']),$md6) ?>
				<?= tags(input('name_maintenance',"Titre du maintenance",['class' => 'form-control']),$md12) ?>
				<?= tags(input('file',null,['type' => 'file']),$md12) ?>
				<?= tags(input('created','Temps de maintenance',['class' => 'form-control datepick']),$md6) ?>
				<?= tags(select('default',"Page par defaut",['options' => scan() ,'class' => 'form-control']),$md6) ?>
				<?= tags(checkbox('maintenance', null, ['message' => ' <span style="">Maintenance</span>']),$md12) ?>
				<?= tags(select('tmp',"Theme du site",['options' => Template() ,'class' => 'form-control']),$md6) ?>
				<?= tags(input('dash',"Masque dashboard",['class' => 'form-control']),$md6) ?>
				<?= tags(textarea('content',"Message Maintenance", ['id' => 'text-editor']),$md12) ?>
				<div id="datepicker" style="display:none">
				<h4 id="month-title"></h4>
						<input type="button" name="prev-y" value="Prev Year"  id="prev-y" ">
							<span id="year">2018</span>	
						<input type="button" name="next-y" value="Next Year"  id="next-y" ">
					<table id="dt-able" >
				<td class="day_val"> </td>
					</table>
					<input type="button" name="prev" value="Prev Mo"  id="prev-month" ">
					<input type="button" name="next" value="Next Mo"  id="next-month" ">
				</div>
				<?= csrfInput() ?>
				<?= tags(submit('Envoyer'),$md12) ?>
			<?= FormEnd() ?>
		</div>
	</div>
</div>