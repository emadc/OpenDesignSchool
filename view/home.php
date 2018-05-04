				<section id="welcame" class="col-12">
					<div class="text-center align-middle">
						<h1>Your favorite buisiness site multi purpose template</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						<button>Find out more</button>
					</div>
				</section>
				<section id="services" class="col-12">
					<div class="row">
						<?php foreach ($services AS $service):?>
							<div class="text-center col-xl-4 col-md-6 col-12">
								<img alt="Easily customised" src="<?php echo UPOLOAD_URL.'services/'.$service->getImage();?>" />
								<h3><?php echo $service->getTitle();?></h3>
								<p><?php echo $service->getText();?></p>
							</div>
						<?php endforeach;?>
					</div>
				</section>
				<section id="gallery_home" class="col-12">
						<div class="row no-gutters">
							<?php foreach ($medias AS $media):?>
								<div class="text-center col-xl-3 col-md-6 col-12">
									<div data-toggle="modal" data-target="#galleryModal" data-title="<?php echo $media->getTitle()?>" data-source="<?php echo UPOLOAD_URL."gallery/".$media->getFileName();?>">
										<h3><?php echo $media->getTitle()?></h3>
										<p><?php echo $media->getText()?></p>
									</div>
									<img class="img-fluid" alt="<?php echo $media->getTitle()?>" src="<?php echo UPOLOAD_URL."gallery/".$media->getFileName();?>" />
								</div>
							<?php endforeach;?>
						</div>
				</section>
