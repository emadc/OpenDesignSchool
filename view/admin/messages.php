<div class="content-wrapper">
	<div class="container-fluid">
		<!-- Example DataTables Card-->
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i>
				Liste des messages
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
						<?php foreach ($messages AS $message):?>
							<tr>
								<td><?php echo $message->getId()?></td>
								<td><?php echo $message->getNomPrenom()?></td>
								<td><?php echo $message->getEmail()?></td>
								<td><?php echo $message->getTel()?></td>
								<td><?php echo $message->getSociete()?></td>
								<td><?php echo date('d-m-Y H\h m', strtotime($message->getDateCreation()))?></td>
								<td style="vertical-align: middle; text-align: center; cursor: pointer;">
									<i data-target="#edit_contact" data-toggle="modal" title="Lire le message" class="fa <?php echo $message->isRead() == 0 ? 'fa-envelope' : 'fa-envelope-open'?> fa-2x" aria-hidden="true" data-source="message-read" data-id="<?php echo $message->getId()?>" style="color:<?php echo $message->isRead() == 0 ? '#28a745;' : '#007bff;'?>"></i>
									<i data-target="#edit_contact" data-toggle="modal" title="Ajouter le contact" class="fa fa-address-card fa-2x" aria-hidden="true" data-source="contacts-add" data-id="<?php echo $message->getId()?>" style="color:#007bff;"></i>
									<i data-target="#delete" data-toggle="modal" title="supprimer" class="fa fa-trash fa-2x" aria-hidden="true" data-source="messages-del" data-id="<?php echo $message->getId()?>" style="color: red;"></i>									
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