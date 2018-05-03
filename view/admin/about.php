<div class="content-wrapper">
	<div class="container-fluid">
		<div class="col-12">
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-hand-o-right"></i>
					<span class="nav-link-text">Qui sommes nous</span>
				</div>
				<div>
					<form class="form_about" name="about" action="<?php echo htmlspecialchars(HOST.'about_page');?>" method="post" enctype="multipart/form-data">
						<div>
							<input type="hidden" name="values[id]" value="<?php echo $page->getId();?>">
							<input type="hidden" name="values[item_alias]" value="<?php echo $page->getItemAlias();?>">
							<input style="margin-bottom: 10px;" type="text" class="form-control" id="title" name="values[title]" aria-describedby="emailHelp" placeholder="Titre" value="<?php echo $page->getTitle();?>" autocomplete="off" required>
							<textarea id="text" name='values[text]' class='form-control' style='height: 200px;' placeholder="Presentation"><?php echo $page->getText();?></textarea>
						</div>
						<div>
							<input class='form-control' name="fileToUpload" type="file" autocomplete="off" required>
						</div>
						<div>
							<img src="<?php echo ASSETS."img/uploads/".$page->getImage();?>" style="width: 100px;">
						</div>
						<div style="text-align: right;">
							<input class="btn btn-primary" type="submit" value="Enregistrer">
						</div>
					</form>
				</div>
				<div class="card-footer small text-muted">Updated <?php echo date('d-m-Y H\h m', strtotime($page->getDateModif()));?></div>
			</div>
		</div>
	</div>
</div>