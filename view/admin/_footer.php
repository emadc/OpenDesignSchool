		<footer class="sticky-footer">
	      <div class="container">
	        <div class="text-center">
	          <small>Copyright © Your Website 2018</small>
	        </div>
	      </div>
	    </footer>
        <!-- Logout Modal-->
	    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	      <div class="modal-dialog" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
	            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">×</span>
	            </button>
	          </div>
	          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
	          <div class="modal-footer">
	            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	            <a class="btn btn-primary" href="logout">Logout</a>
	          </div>
	        </div>
	      </div>
	    </div>
	    <!-- Contact / Message Modal -->
	    <div class="modal fade" id="edit_contact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	      <div class="modal-dialog modal-dialog-centered" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title" id="exampleModalLabel">Voulez vous enregistrer le contact du message n° <span id="n_msg"></span> ?</h5>
	            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">×</span>
	            </button>
	          </div>
	          <div class="modal-body">
				<section id="contact" class="col-12 ">
					<div class="form_container">
						<form name="contact" class="row no-gutters" action="<?php echo htmlspecialchars(HOST.'set_contact');?>" method="post">
							<div class="form-group col-12">
								<input type="text" class="form-control" id="nom_prenom" name="values[nom_prenom]" aria-describedby="emailHelp" placeholder="Nom & prénom" autocomplete="off" required>
								<input type="email" class="form-control" id="email" name="values[email]" aria-describedby="emailHelp" placeholder="Email" autocomplete="off" required>
								<input type="text" class="form-control" id="tel" name="values[tel]" aria-describedby="emailHelp" placeholder="Théléphone">
								<input type="text" class="form-control" id="societe" name="values[societe]" aria-describedby="emailHelp" placeholder="Société">
							</div>
						</form>
					</div>
				</section>
			  </div>
	          <div class="modal-footer">
	            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	            <button class="btn btn-primary" type="button" onclick="document.contact.submit()">Enregistrer</button>
	          </div>
	        </div>
	      </div>
	    </div>
	    <!-- Service Modal -->
	    <div class="modal fade" id="edit_service" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	      <div class="modal-dialog modal-dialog-centered" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title" id="exampleModalLabel"></h5>
	            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">×</span>
	            </button>
	          </div>
	          <div class="modal-body">
				<div class="form_container">
					<form name="services" class="row no-gutters" action="<?php echo htmlspecialchars(HOST.'service_upload');?>" method="post" enctype="multipart/form-data">
						<div class="form-group col-12">
							<img alt="service" src="" style="display: none;" id="image">
							<input type="text" class="form-control" id="title" name="values[title]" aria-describedby="emailHelp" placeholder="Titre" autocomplete="off" required>
							<textarea id="text" name='values[text]' class='form-control' style='height: 200px;'></textarea>
							<input class='form-control' name="fileToUpload" type="file" autocomplete="off" required>
						</div>
						<div class="form-group col-12" style="text-align: right;">
			          		<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
			          		<input class="btn btn-primary" type="submit" value="Enregistrer">
						</div>
					</form>
				</div>
			  </div>
	          <div class="modal-footer">
	          </div>
	        </div>
	      </div>
	    </div>
	   <!-- Delete Modal -->
	    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	      <div class="modal-dialog modal-dialog-centered" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title" id="exampleModalLabel"></h5>
	            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">×</span>
	            </button>
	          </div>
	          <div class="modal-body">
                  <form name="delete" action="" method="post">
	            	<input id="id" type="hidden" name="id" />
				 </form>
			  </div>
	          <div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<button class="btn btn-primary" type="button" onclick="document.delete.submit()">Ok</button>
	          </div>
	        </div>
	      </div>
	    </div>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
		<script src="<?php echo ASSETS;?>js/admin.js"></script>
	</body>
</html>