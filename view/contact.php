				<section id="contact" class="col-12 ">
					<div class="form_container">
						<h1 class="h1_title">Contact</h1>
						<form class="row no-gutters" action="<?php echo HOST;?>contact/save">
							<div class="form-group col-md-4 col-12">
								<input type="text" class="form-control" id="nom_prenom" name="nom_prenom" aria-describedby="emailHelp" placeholder="Nom & prénom">
								<input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
								<input type="text" class="form-control" id="tel" name="tel" aria-describedby="emailHelp" placeholder="Théléphone">
								<input type="text" class="form-control" id="tel" name="tel" aria-describedby="emailHelp" placeholder="Société">
							</div>
							<div class="form-group col-md-8 col-12">
								<textarea class="form-control" placeholder="Message" name="message"></textarea>
							</div>
							<div class="col-12 text-center">
								<button type="submit" class="btn btn-primary">Envoyer</button>
							</div>
						</form>
					</div>
					<div id="map" class=""></div>
				</section>
