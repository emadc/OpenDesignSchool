<div class="content-wrapper">
	<div class="container-fluid">
		<div class="col-12">
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-picture-o"></i>
					Galerie
					<div style="float: right;">
						<a href="#" data-target="#edit_uploads" data-toggle="modal" data-source="media-add">
							<i class="fa fa-cloud-upload" aria-hidden="true"></i>
							Ajouter un media
						</a>
					</div>
				</div>
				<div>
					<div class="row no-gutters">
					<?php foreach ($gallery as $galleryObj):?>
					<div class="col-lg-3">
							<div class="card my-3 mx-3 ">
								<div style="max-height: 275px; overflow: hidden;">
									<a target="_blanck" href="<?php echo ASSETS."img/uploads/gallery/".$galleryObj->getFileName();?>">
										<img class="card-img-top img-fluid w-100" src="<?php echo ASSETS."img/uploads/gallery/".$galleryObj->getFileName();?>" style="width: 100px;">
									</a>
								</div>
								<div class="card-body">
									<h6 class="card-title mb-1">
										#<?php echo $galleryObj->getId();?>
										<a href="#"> <?php echo $galleryObj->getTitle();?></a>
									</h6>
									<p class="card-text small">
										<?php echo $galleryObj->getText();?>
									</p>
								</div>
								<hr class="my-0">
								<div class="card-body py-2 small">
									<i data-target="#delete" data-toggle="modal" title="supprimer" class="fa fa-trash fa-2x" aria-hidden="true" data-source="media-del" data-id="<?php echo $galleryObj->getId()?>" style="color: red;cursor: pointer;"></i>
									<i data-target="#edit_uploads" data-toggle="modal" title="Modifier le media" class="fa fa-pencil fa-2x" aria-hidden="true" data-source="media-edit" data-id="<?php echo $galleryObj->getId()?>" style="color: #007bff;float: right;cursor: pointer;"></i>
								</div>
								<div class="card-footer small text-muted">Publié le <?php echo date('d-m-Y H\h m', strtotime($galleryObj->getDateModif()));?></div>
							</div>
						</div>
						<?php endforeach;?>
					</div>
				</div>
				<div class="card-footer small text-muted"></div>
			</div>
		</div>
	</div>
</div>