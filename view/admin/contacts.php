<div class="content-wrapper">
	<div class="container-fluid">
		<!-- Example DataTables Card-->
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i>
				Liste des contacts
				<div style="float: right;"><a href="#" data-target="#edit_contact" data-toggle="modal" data-source="contacts-add"><i class="fa fa-address-card" aria-hidden="true"></i> Ajouter un contact</a></div>
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
						<?php foreach ($contacts AS $contact):?>
							<tr>
								<td><?php echo $contact->getId()?></td>
								<td><?php echo $contact->getNomPrenom()?></td>
								<td><?php echo $contact->getEmail()?></td>
								<td><?php echo $contact->getTel()?></td>
								<td><?php echo $contact->getSociete()?></td>
								<td><?php echo date('d-m-Y H\h m', strtotime($contact->getDateCreation())) ?></td>
								<td style="vertical-align: middle; text-align: center; cursor: pointer;">
									<i data-target="#edit_contact" data-toggle="modal" title="modifier" class="fa fa-pencil fa-2x" aria-hidden="true" data-source="contacts-edit" data-id="<?php echo $contact->getId()?>" style="color:#007bff;"></i>
									<i data-target="#delete" data-toggle="modal" title="supprimer" class="fa fa-trash fa-2x" aria-hidden="true" data-source="contacts-del" data-id="<?php echo $contact->getId()?>" style="color: red;"></i>
									
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