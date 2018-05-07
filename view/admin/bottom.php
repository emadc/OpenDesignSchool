<div class="content-wrapper">
	<div class="container-fluid">
		<div class="col-12">
			<div class="card mb-3">
				<div class="card-header">
					<i class="fa fa-hand-o-right"></i>
					<span class="nav-link-text">Bas de page</span>
				</div>
				<div>
					<form class="form_admin" name="bottom" action="<?php echo htmlspecialchars(HOST.'page_upload');?>" method="post" enctype="multipart/form-data">
						<div>
							<input type="hidden" name="values[id]" value="<?php echo $page->getId();?>">
							<input type="hidden" name="values[id_section]" value="<?php echo $page->getIdSection();?>">
							<input type="hidden" name="values[item_alias]" value="bottom">
							<input style="margin-bottom: 10px;" type="text" class="form-control" id="title" name="values[title]"  placeholder="Titre" value="<?php echo $page->getTitle();?>" autocomplete="off" required>
							<input style="margin-bottom: 10px;" type="text" class="form-control" id="link" name="values[link]"  placeholder="Lien" value="<?php echo $page->getLink();?>" autocomplete="off" >
							<textarea id="text" name='values[text]' class='form-control' style='height: 200px;margin-bottom: 10px;' placeholder="Texte"><?php echo $page->getText();?></textarea>
						</div>
						<div>
							<input class='form-control' name="fileToUpload" type="file" autocomplete="off" required>
						</div>
						<div>
							<?php if (!empty($page->getImage())):?>
								<a target="_blanck" href="<?php echo ASSETS."img/uploads/".$page->getImage();?>">
									<img src="<?php echo ASSETS."img/uploads/".$page->getImage();?>" style="max-width: 300px;">
								</a>
							<?php endif;?>
						</div>
						<div style="text-align: right;">
							<input class="btn btn-primary" type="submit" value="Enregistrer">
						</div>
					</form>
				</div>
				<div class="card-footer small text-muted"><?php if (!empty($page->getDateModif())) echo "Publié le ".date('d-m-Y H\h m', strtotime($page->getDateModif()));?></div>
			</div>
		</div>
	</div>
</div>