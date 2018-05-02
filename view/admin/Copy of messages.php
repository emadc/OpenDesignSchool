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
					<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>#</th>
								<th>Nom prenom</th>
								<th>e-mail</th>
								<th>Théléphone</th>
								<th>Société</th>
								<th>Message</th>
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
								<td><?php echo $message->getMessage()?></td>
								<td><?php echo $message->getDateCreation()?></td>
								<td style="vertical-align: middle; text-align: center; cursor: pointer;">
									<i data-target="#edit_contact" data-toggle="modal" title="Ajouter le contact" class="fa fa-address-card fa-2x" aria-hidden="true" data-whatever="<?php echo $message->getId()?>" style="color:#007bff;"></i>
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