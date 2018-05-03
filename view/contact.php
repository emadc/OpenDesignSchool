				<section id="contact" class="col-12 ">
					<div class="main_container">
						<?php if ($valid):?>
							<div class="alert alert-primary alert-dismissible fade show" role="alert">
							  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>
						<?php endif;?>
						<h1 class="h1_title">Contact</h1>
						<form class="row no-gutters" action="<?php echo htmlspecialchars(HOST.'message');?>" method="post">
							<div class="form-group col-md-4 col-12">
								<input type="text" class="form-control" name="values[nom_prenom]" aria-describedby="emailHelp" placeholder="Nom & prénom" autocomplete="off" required>
								<input type="email" class="form-control" name="values[email]" aria-describedby="emailHelp" placeholder="Email" autocomplete="off" required>
								<input type="text" class="form-control" name="values[tel]" aria-describedby="emailHelp" placeholder="Théléphone">
								<input type="text" class="form-control" name="values[societe]" aria-describedby="emailHelp" placeholder="Société">
							</div>
							<div class="form-group col-md-8 col-12">
								<textarea class="form-control" placeholder="Message" name="values[message]" autocomplete="off" required></textarea>
							</div>
							<div class="col-12 text-center">
								<button type="submit" class="btn btn-primary">Envoyer</button>
							</div>
						</form>
					</div>
					<div id="map" class=""></div>
				</section>
