<div class="content-wrapper">
	<div class="container-fluid">
		<!-- Example DataTables Card-->
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i>
				Liste des sections
				<div style="float: right;"><a href="#" data-target="#edit_section" data-toggle="modal" data-source="section-add"><i class="fa fa-address-card" aria-hidden="true"></i> Ajouter un section</a></div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="display" id="table" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Alias</th>
								<th>Lien</th>
								<th>Actif</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($sections AS $section):?>
							<tr>
								<td><?php echo $section->getId()?></td>
								<td><?php echo $section->getItemText()?></td>
								<td><?php echo $section->getItemAlias()?></td>
								<td><?php if ($section->getEditable()==1) echo $section->getItemLink();?></td>
								<td><?php echo $section->getMenu() == 0 ? "non" : "oui"?></td>
								<td style="vertical-align: middle; text-align: center; cursor: pointer;">
									<i data-target="#edit_section" data-toggle="modal" title="modifier" class="fa fa-pencil fa-2x" aria-hidden="true" data-source="section-edit" data-id="<?php echo $section->getId()?>" style="color:#007bff;"></i>
									<?php if ($section->getEditable()==1):?>
										<i data-target="#delete" data-toggle="modal" title="supprimer" class="fa fa-trash fa-2x" aria-hidden="true" data-source="sections-del" data-id="<?php echo $section->getId()?>" style="color: red;"></i>
									<?php endif;?>
								</td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>