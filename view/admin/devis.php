<div class="content-wrapper">
	<div class="container-fluid">
		<!-- Example DataTables Card-->
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i>
				Liste des devis
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="display" id="table" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>#</th>
								<th>Nom prenom</th>
								<th>e-mail</th>
								<th>Théléphone</th>
								<th>Société</th>
								<th>Date Creation</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($deviss AS $devis):?>
							<tr>
								<td><?php echo $devis->getId()?></td>
								<td><?php echo $devis->getNomPrenom()?></td>
								<td><?php echo $devis->getEmail()?></td>
								<td><?php echo $devis->getTel()?></td>
								<td><?php echo $devis->getSociete()?></td>
								<td><?php echo date('d-m-Y H\h m', strtotime($devis->getDateCreation()))?></td>
								<td style="vertical-align: middle; text-align: center; cursor: pointer;">
									<i data-target="#edit_contact" data-toggle="modal" title="Lire le devis" class="fa <?php echo $devis->isRead() == 0 ? 'fa-envelope' : 'fa-envelope-open'?> fa-2x" aria-hidden="true" data-source="devis-read" data-id="<?php echo $devis->getId()?>" style="color:<?php echo $devis->isRead() == 0 ? '#28a745;' : '#007bff;'?>"></i>
									<i data-target="#edit_contact" data-toggle="modal" title="Ajouter le contact" class="fa fa-address-card fa-2x" aria-hidden="true" data-source="contacts-add" data-id="<?php echo $devis->getId()?>" style="color:#007bff;"></i>
									<i data-target="#delete" data-toggle="modal" title="supprimer" class="fa fa-trash fa-2x" aria-hidden="true" data-source="devis-del" data-id="<?php echo $devis->getId()?>" style="color: red;"></i>									
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