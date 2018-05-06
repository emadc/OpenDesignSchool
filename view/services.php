				<section id="services" class="col-12 page" style="padding-top: 40px;">
					<div class="main_container">
						<h1 class="h1_title"><?php echo $page->getTitle();?></h1>
						<div class="row">
							<?php foreach ($services AS $service):?>
								<div class="text-center col-xl-4 col-md-6 col-12">
									<img alt="<?php echo $service->getTitle();?>" src="<?php echo UPOLOAD_URL.'services/'.$service->getImage();?>" />
									<h3><?php echo $service->getTitle();?></h3>
									<p><?php echo $service->getText();?></p>
								</div>
							<?php endforeach;?>
						</div>
						<div class="text">
							<p><?php echo $page->getText();?></p>
						</div>
					</div>
				</section>
