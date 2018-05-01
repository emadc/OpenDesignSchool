<div class="content-wrapper">
	<div class="container-fluid">
		<!-- Example DataTables Card-->
		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-table"></i>
				Liste de contacts
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
								<td><?php echo $contact->getMessage()?></td>
								<td><?php echo $contact->getDateCreation()?></td>
							</tr>
						<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container-fluid-->
	<!-- /.content-wrapper-->
</div>