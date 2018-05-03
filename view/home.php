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
    					<div class="text-center col-xl-3 col-md-6 col-12">
    						<div>
        						<h3>Project name</h3>
        						<p>User Interface Design</p>    						
    						</div>
    						<img class="img-fluid" alt="" src="<?php echo ASSETS;?>img/gal_1.jpg" />
    					</div>
    					<div class="text-center col-xl-3 col-md-6 col-12">
    						<div>
        						<h3>Project name</h3>
        						<p>User Interface Design</p>    						
    						</div>
    						<img class="img-fluid" alt="" src="<?php echo ASSETS;?>img/gal_2.jpg" />
    					</div>
    					<div class="text-center col-xl-3 col-md-6 col-12">
    						<div>
        						<h3>Project name</h3>
        						<p>User Interface Design</p>    						
    						</div>
    						<img class="img-fluid" alt="" src="<?php echo ASSETS;?>img/gal_3.jpg" />
    					</div>
    					<div class="text-center col-xl-3 col-md-6 col-12">
    						<div>
        						<h3>Project name</h3>
        						<p>User Interface Design</p>    						
    						</div>
    						<img class="img-fluid" alt="" src="<?php echo ASSETS;?>img/gal_4.jpg" />
    					</div>
    					<div class="text-center col-xl-3 col-md-6 col-12">
    						<div>
        						<h3>Project name</h3>
        						<p>User Interface Design</p>    						
    						</div>
    						<img class="img-fluid" alt="" src="<?php echo ASSETS;?>img/gal_4.jpg" />
    					</div>
    					<div class="text-center col-xl-3 col-md-6 col-12">
    						<div>
        						<h3>Project name</h3>
        						<p>User Interface Design</p>    						
    						</div>
    						<img class="img-fluid" alt="" src="<?php echo ASSETS;?>img/gal_3.jpg" />
    					</div>
    					<div class="text-center col-xl-3 col-md-6 col-12">
    						<div>
        						<h3>Project name</h3>
        						<p>User Interface Design</p>    						
    						</div>
    						<img class="img-fluid" alt="" src="<?php echo ASSETS;?>img/gal_2.jpg" />
    					</div>
    					<div class="text-center col-xl-3 col-md-6 col-12">
    						<div>
        						<h3>Project name</h3>
        						<p>User Interface Design</p>    						
    						</div>
    						<img class="img-fluid" alt="" src="<?php echo ASSETS;?>img/gal_1.jpg" />
    					</div>    										    					    					
					</div>
				</section>
