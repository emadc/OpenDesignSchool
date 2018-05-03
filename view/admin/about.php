<div class="content-wrapper">
	<div class="container-fluid">
		<div class="col-12">
			<div class="card mb-3">
				<div class="card-header">
				<i class="fa fa-handshake-o"></i>
				Services
				</div>
				<div>
					<form class="form_services" name="services" action="<?php echo htmlspecialchars(HOST.'service_page');?>" method="post" enctype="multipart/form-data">
						<div>
							<input type="hidden" name="values[id]" value="<?php echo $page->getId();?>">
							<input style="margin-bottom: 10px;" type="text" class="form-control" id="title" name="values[title]" aria-describedby="emailHelp" placeholder="Titre" value="<?php echo $page->getTitle();?>" autocomplete="off" required>
							<textarea id="text" name='values[text]' class='form-control' style='height: 200px;' placeholder="Presentation"><?php echo $page->getText();?></textarea>
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