<div class="content-wrapper">
	<div class="container-fluid">
		<div class="col-12">
			<div class="card mb-3">
				<div class="card-header">
				<i class="fa fa-handshake-o"></i>
				Services
				</div>
				<div>
					<form class="form_services" name="services" action="<?php echo htmlspecialchars(HOST.'service_page');?>" method="post" enctype="multipart/form-data">
						<div>
							<input type="hidden" name="values[id]" value="<?php echo $page->getId();?>">
							<input style="margin-bottom: 10px;" type="text" class="form-control" id="title" name="values[title]" aria-describedby="emailHelp" placeholder="Titre" value="<?php echo $page->getTitle();?>" autocomplete="off" required>
							<textarea id="text" name='values[text]' class='form-control' style='height: 200px;' placeholder="Presentation"><?php echo $page->getText();?></textarea>
						</div>
						<div style="text-align: right;">
			          		<input class="btn btn-primary" type="submit" value="Enregistrer">
						</div>
					</form>
				</div>
				<div class="card-footer small text-muted">Updated <?php echo date('d-m-Y H\h m', strtotime($page->getDateModif()));?></div>
			</div>
			<!-- DataTables services -->
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-table"></i>
					Liste des services
					<div style="float: right;">
						<a href="#" data-target="#edit_service" data-toggle="modal" data-source="service-add">
							<i class="fa fa-handshake-o" aria-hidden="true"></i>
							Ajouter un service
						</a>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="display" id="table" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>#</th>
									<th>Title</th>
									<th>Text</th>
									<th>Image</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
						<?php foreach ($services AS $service):?>
							<tr>
									<td><?php echo $service->getId()?></td>
									<td><?php echo $service->getTitle()?></td>
									<td><?php echo $service->getText()?></td>
									<td><?php echo $service->getImage()?></td>
									<td style="vertical-align: middle; text-align: center; cursor: pointer; width: 55px;">
										<i data-target="#edit_service" data-toggle="modal" title="Modifier le service" class="fa fa-pencil fa-2x" aria-hidden="true" data-source="service-edit" data-id="<?php echo $service->getId()?>" style="color: #007bff;"></i>
										<i data-target="#delete" data-toggle="modal" title="supprimer" class="fa fa-trash fa-2x" aria-hidden="true" data-source="services-del" data-id="<?php echo $service->getId()?>" style="color: red;"></i>
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
</div>