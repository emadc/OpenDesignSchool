<section id="about" class="col-12 page" >
	<div class="main_container">
		<h1 class="h1_title"><?php echo $page->getTitle();?></h1>
		<div class="row">
			<p class="col-lg-6"><?php echo $page->getText();?></p>
			<img alt="<?php echo $page->getImage();?>" src="<?php echo UPOLOAD_URL.$page->getimage();?>" class="img-fluid col-lg-6" style="height: 100%;">
		</div>
	</div>
</section>
