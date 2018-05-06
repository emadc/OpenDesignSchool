<div class="content-wrapper">
	<div class="container-fluid">
		<!-- Icon Cards-->
		<div class="row">
			<div class="col-lg-4  mb-3">
				<div class="card text-white bg-primary o-hidden h-100">
					<div class="card-body">
						<div class="card-body-icon">
							<i class="fa fa-fw fa-comments"></i>
						</div>
						<div class="mr-5"><?php echo count($newMsgs);?> Nouveaux messages!</div>
					</div>
					<a class="card-footer text-white clearfix small z-1" href="messages">
						<span class="float-left">voir les détails</span>
						<span class="float-right">
							<i class="fa fa-angle-right"></i>
						</span>
					</a>
				</div>
			</div>
			<div class="col-lg-4  mb-3">
				<div class="card text-white bg-warning o-hidden h-100">
					<div class="card-body">
						<div class="card-body-icon">
							<i class="fa fa-fw fa-list"></i>
						</div>
						<div class="mr-5"><?php echo count($newDevis);?> Nouvelles demandes de devis!</div>
					</div>
					<a class="card-footer text-white clearfix small z-1" href="devis_admin">
						<span class="float-left">voir les détails</span>
						<span class="float-right">
							<i class="fa fa-angle-right"></i>
						</span>
					</a>
				</div>
			</div>
			<div class="col-lg-4  mb-3">
				<div class="card text-white bg-success o-hidden h-100">
					<div class="card-body">
						<div class="card-body-icon">
							<i class="fa fa-fw fa-address-card"></i>
						</div>
						<div class="mr-5"><?php echo $prospects ?> Prospects!</div>
					</div>
					<a class="card-footer text-white clearfix small z-1" href="contacts">
						<span class="float-left">voir les détails</span>
						<span class="float-right">
							<i class="fa fa-angle-right"></i>
						</span>
					</a>
				</div>
			</div>
		</div>
		<!-- Area Chart Example-->
		<div class="mb-0 mt-4">
			<i class="fa fa-picture-o"></i>
			Dernières images de la galerie
		</div>
		<hr class="mt-2">
		<div class="row">
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
						<div class="card-footer small text-muted">Publié le <?php echo date('d-m-Y H\h m', strtotime($galleryObj->getDateModif()));?></div>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</div>
	<!-- /.container-fluid-->
	<!-- /.content-wrapper-->
</div>