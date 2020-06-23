<div class="Tableadmin">
	<?= isset($title) ? tag($title, "h3") : null ?>
	<?php $url = isset($url) ? $url : null ?>
	<table>
		<thead>
			<tr>
				<?php foreach (isset($thead) ? $thead : []  as $kthead => $vthead): ?>
					<th><?= $vthead ?></th>
				<?php endforeach ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach (isset($data) ? $data : [] as $key => $value): ?>
				<?php extract($value); ?>
				<tr>
					<?php if (isset($online)): ?>
						<td width="50px" align="center"><?= (isset($online)) ? getWidjet("statue", ["statue" => $online]) : null ?></td>
					<?php endif ?>
					<?php if (isset($name)): ?>
						<td><?= $name ?></td>
					<?php endif ?>
					<?php if (isset($category)): ?>
						<td><?= $category ?></td>
					<?php endif ?>
					<?php if (isset($users)): ?>
						<td><?= $users ?></td>
					<?php endif ?>
					<?php if (isset($created)): ?>
						<td width="150px" data-ago="<?= (!empty($created)) ? $created : time() ?>"><?= $created ?></td>
					<?php endif ?>
					<td width="100px" >
						<div class="action">
							<a href="<?= Url($url . 'edit/id:' . $id) ?>"><span>pen</span></a>
							<a href="<?= Url($url . 'delete/id:' . $id) ?>"><span>tim</span></a>
						</div>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>