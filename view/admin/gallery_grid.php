<div class="content-wrapper">
	<div class="container-fluid">
		<div class="col-12">
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-table"></i>
					Galerie
					<div style="float: right;">
						<a href="#" data-target="#edit_uploads" data-toggle="modal" data-section="grid" data-source="media-add">
							<i class="fa fa-cloud-upload" aria-hidden="true"></i>
							Ajouter un media
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
									<th>Texte</th>
									<th>Nom du fichier</th>
									<th>Publié le</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
						<?php foreach ($gallery as $galleryObj):?>
							<tr>
								<td><?php echo $galleryObj->getId()?></td>
								<td><?php echo $galleryObj->getTitle()?></td>
								<td><?php echo $galleryObj->getText()?></td>
								<td><?php echo $galleryObj->getFileName()?></td>
								<td><?php echo date('d-m-Y H\h m', strtotime($galleryObj->getDateModif())) ?></td>
								<td style="vertical-align: middle; text-align: center; cursor: pointer;">
									<i data-target="#edit_uploads" data-toggle="modal" title="modifier" class="fa fa-pencil fa-2x" aria-hidden="true" data-section="grid" data-source="media-edit" data-id="<?php echo $galleryObj->getId()?>" style="color: #007bff;"></i>
									<i data-target="#delete" data-toggle="modal" title="supprimer" class="fa fa-trash fa-2x" aria-hidden="true" data-source="gallery-del" data-id="<?php echo $galleryObj->getId()?>" style="color: red;"></i>

								</td>
							</tr>
						<?php endforeach;?>
						</tbody>
						</table>
					</div>
				</div>
				<div class="card-footer small text-muted"></div>
			</div>
		</div>
	</div>
</div>