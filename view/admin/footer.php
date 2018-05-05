<div class="content-wrapper">
	<div class="container-fluid">
		<div class="mb-0 mt-4">
			<i class="fa fa-newspaper-o"></i> Pieds de page
		</div>
		<hr class="mt-2">
		<div class="col-12">
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-hand-o-right"></i>
					<span class="nav-link-text">Zone 1</span>
				</div>
				<div>
					<form class="form_admin" name="footer" action="<?php echo htmlspecialchars(HOST.'page_admin');?>" method="post" enctype="multipart/form-data">
						<div>
							<input type="hidden" name="values[id]" value="<?php echo $zone1->getId();?>">
							<input type="hidden" name="values[id_section]" value="<?php echo $zone1->getIdSection();?>">
							<input type="hidden" name="values[item_alias]" value="zone_1">
							<input style="margin-bottom: 10px;" type="text" class="form-control" id="title" name="values[title]"  placeholder="Titre" value="<?php echo $zone1->getTitle();?>" autocomplete="off" required>
							<input style="margin-bottom: 10px;" type="text" class="form-control" id="link" name="values[link]"  placeholder="Lien" value="<?php echo $zone1->getLink();?>" autocomplete="off" >
							<textarea id="text" name='values[text]' class='form-control' style='height: 200px;margin-bottom: 10px;' placeholder="Texte"><?php echo $zone1->getText();?></textarea>
						</div>
						<div style="text-align: right;">
							<input class="btn btn-primary" type="submit" value="Enregistrer">
						</div>
					</form>
				</div>
				<div class="card-footer small text-muted"><?php if (!empty($zone1->getDateModif())) echo "Publié le ".date('d-m-Y H\h m', strtotime($zone1->getDateModif()));?></div>
			</div>
		</div>
		<div class="col-12">
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-hand-o-right"></i>
					<span class="nav-link-text">Zone 2</span>
				</div>
				<div class="row no-gutters social_caard">
					<div class="col-lg-3">
						<div class="card my-3 mx-3 ">
							<?php if (!empty($zone2_social1->getImage())):?>
								<div style="max-height: 275px; overflow: hidden;">
									<a target="_blanck" href="<?php echo ASSETS."img/uploads/".$zone2_social1->getImage();?>">
										<img class="card-img-top img-fluid w-100" src="<?php echo ASSETS."img/uploads/".$zone2_social1->getImage();?>" style="max-width: 100%;">
									</a>
								</div>
								<div class="card-body">
									<h6 class="card-title mb-1">
										#<?php echo $zone2_social1->getId();?>
										<a href="<?php echo $zone2_social1->getLink();?>"> <?php echo $zone2_social1->getTitle();?></a>
									</h6>
								</div>
							<?php endif;?>
							<hr class="my-0">
							<div class="card-body py-2 small" style="width: 100%;">
								<i data-target="#delete" data-toggle="modal" title="supprimer" class="fa fa-trash fa-2x" aria-hidden="true" data-source="social-del" data-id="<?php echo $zone2_social1->getId()?>" style="color: red;cursor: pointer;"></i>
								<i data-target="#edit_uploads" data-toggle="modal" title=" Téléverser" class="fa fa-cloud-upload fa-2x"  data-source="social-add" data-id="<?php echo $zone2_social1->getId()?>" style="color: #007bff;float:right;cursor: pointer;"></i>
								<?php if (!empty($zone2_social1->getImage())):?>
									<i data-target="#edit_uploads" data-toggle="modal" title="Modifier le social" class="fa fa-pencil fa-2x"  data-source="social-edit" data-id="<?php echo $zone2_social1->getId()?>" style="color: #007bff;float: right;cursor: pointer;"></i>
								<?php endif;?>
							</div>
							<div style="width: 100%;" class="card-footer small text-muted"><?php if (!empty($zone2_social1->getDateModif())) echo "Publié le <br>".date('d-m-Y H\h m', strtotime($zone2_social1->getDateModif()));?></div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card my-3 mx-3 ">
							<?php if (!empty($zone2_social2->getImage())):?>
								<div style="max-height: 275px; overflow: hidden;">
									<a target="_blanck" href="<?php echo ASSETS."img/uploads/".$zone2_social2->getImage();?>">
										<img class="card-img-top img-fluid w-100" src="<?php echo ASSETS."img/uploads/".$zone2_social2->getImage();?>" style="max-width: 100%;">
									</a>
								</div>
								<div class="card-body">
									<h6 class="card-title mb-1">
										#<?php echo $zone2_social2->getId();?>
										<a href="<?php echo $zone2_social2->getLink();?>"> <?php echo $zone2_social1->getTitle();?></a>
									</h6>
								</div>
							<?php endif;?>
							<hr class="my-0">
							<div class="card-body py-2 small" style="width: 100%;">
								<i data-target="#delete" data-toggle="modal" title="supprimer" class="fa fa-trash fa-2x" aria-hidden="true" data-source="social-del" data-id="<?php echo $zone2_social2->getId()?>" style="color: red;cursor: pointer;"></i>
								<i data-target="#edit_uploads" data-toggle="modal" title=" Téléverser" class="fa fa-cloud-upload fa-2x"  data-source="social-add" data-id="<?php echo $zone2_social2->getId()?>" style="color: #007bff;float:right;cursor: pointer;"></i>
								<?php if (!empty($zone2_social2->getImage())):?>	
									<i data-target="#edit_uploads" data-toggle="modal" title="Modifier le social" class="fa fa-pencil fa-2x"  data-source="social-edit" data-id="<?php echo $zone2_social2->getId()?>" style="color: #007bff;float: right;cursor: pointer;"></i>
								<?php endif;?>
							</div>
							<div style="width: 100%;" class="card-footer small text-muted"><?php if (!empty($zone2_social2->getDateModif())) echo "Publié le <br>".date('d-m-Y H\h m', strtotime($zone2_social2->getDateModif()));?></div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="card my-3 mx-3 ">
							<?php if (!empty($zone2_social3->getImage())):?>
								<div style="max-height: 275px; overflow: hidden;">
									<a target="_blanck" href="<?php echo ASSETS."img/uploads/".$zone2_social3->getImage();?>">
										<img class="card-img-top img-fluid w-100" src="<?php echo ASSETS."img/uploads/".$zone2_social3->getImage();?>" style="max-width: 100%;">
									</a>
								</div>
								<div class="card-body">
									<h6 class="card-title mb-1">
										#<?php echo $zone2_social3->getId();?>
										<a href="<?php echo $zone2_social3->getLink();?>"> <?php echo $zone2_social1->getTitle();?></a>
									</h6>
								</div>
							<?php endif;?>
							<hr class="my-0">
							<div class="card-body py-2 small" style="width: 100%;">
								<i data-target="#delete" data-toggle="modal" title="supprimer" class="fa fa-trash fa-2x" aria-hidden="true" data-source="social-del" data-id="<?php echo $zone2_social3->getId()?>" style="color: red;cursor: pointer;"></i>
								<i data-target="#edit_uploads" data-toggle="modal" title=" Téléverser" class="fa fa-cloud-upload fa-2x"  data-source="social-add" data-id="<?php echo $zone2_social3->getId()?>" style="color: #007bff;float:right;cursor: pointer;"></i>
								<?php if (!empty($zone2_social3->getImage())):?>	
									<i data-target="#edit_uploads" data-toggle="modal" title="Modifier le social" class="fa fa-pencil fa-2x"  data-source="social-edit" data-id="<?php echo $zone2_social3->getId()?>" style="color: #007bff;float: right;cursor: pointer;"></i>
								<?php endif;?>
							</div>
							<div style="width: 100%;" class="card-footer small text-muted"><?php if (!empty($zone2_social3->getDateModif())) echo "Publié le <br>".date('d-m-Y H\h m', strtotime($zone2_social3->getDateModif()));?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12">
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-hand-o-right"></i>
					<span class="nav-link-text">Zone 3</span>
				</div>
				<div>
					<form class="form_admin" name="footer" action="<?php echo htmlspecialchars(HOST.'page_admin');?>" method="post" enctype="multipart/form-data">
						<div>
							<input type="hidden" name="values[id]" value="<?php echo $zone3->getId();?>">
							<input type="hidden" name="values[id_section]" value="<?php echo $zone3->getIdSection();?>">
							<input type="hidden" name="values[item_alias]" value="zone_3">
							<input style="margin-bottom: 10px;" type="text" class="form-control" id="title" name="values[title]"  placeholder="Titre" value="<?php echo $zone3->getTitle();?>" autocomplete="off" required>
							<input style="margin-bottom: 10px;" type="text" class="form-control" id="link" name="values[link]"  placeholder="Lien" value="<?php echo $zone3->getLink();?>" autocomplete="off" >
							<textarea id="text" name='values[text]' class='form-control' style='height: 200px;margin-bottom: 10px;' placeholder="Texte"><?php echo $zone3->getText();?></textarea>
						</div>
						<div style="text-align: right;">
							<input class="btn btn-primary" type="submit" value="Enregistrer">
						</div>
					</form>
				</div>
				<div class="card-footer small text-muted"><?php if (!empty($zone3->getDateModif())) echo "Publié le ".date('d-m-Y H\h m', strtotime($zone3->getDateModif()));?></div>
			</div>
		</div>
		<div class="col-12">
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-hand-o-right"></i>
					<span class="nav-link-text">Bas de page</span>
				</div>
				<div>
					<form class="form_admin" name="footer" action="<?php echo htmlspecialchars(HOST.'page_admin');?>" method="post" enctype="multipart/form-data">
						<div>
							<input type="hidden" name="values[id]" value="<?php echo $zone4->getId();?>">
							<input type="hidden" name="values[id_section]" value="<?php echo $zone4->getIdSection();?>">
							<input type="hidden" name="values[item_alias]" value="zone_4">
							<input style="margin-bottom: 10px;" type="text" class="form-control" id="title" name="values[title]"  placeholder="Titre" value="<?php echo $zone4->getTitle();?>" autocomplete="off" required>
						</div>
						<div style="text-align: right;">
							<input class="btn btn-primary" type="submit" value="Enregistrer">
						</div>
					</form>
				</div>
				<div class="card-footer small text-muted"><?php if (!empty($zone4->getDateModif())) echo "Publié le ".date('d-m-Y H\h m', strtotime($zone4->getDateModif()));?></div>
			</div>
		</div>	
	</div>
</div>