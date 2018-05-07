<section id="gallery_home" class="col-12 page" style="padding-top: 40px;">
	<div class="main_container">
		<h1 class="h1_title">Galerie photos</h1>
	</div>
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
