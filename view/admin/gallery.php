<div class="content-wrapper">
	<div class="container-fluid">
		<form action="gallery_upload" method="post" enctype="multipart/form-data">
			Select image to upload:
			<input type="file" name="fileToUpload" id="fileToUpload">
			<div class="form-group col-md-4 col-12">
				<input type="text" class="form-control" name="values[title]" placeholder="title">
				<input type="text" class="form-control" name="values[desc]" placeholder="description">
			</div>
			<input type="submit" value="Upload Image" name="submit">
		</form>
		<div >
		<?php foreach ($gallery as $galleryObj):?>
		<div><?php echo $galleryObj->getFileName()?></div>
		<?php endforeach;?>
		</div>
	</div>
</div>