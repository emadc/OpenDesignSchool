		<footer class="sticky-footer">
	      <div class="container">
	        <div class="text-center">
	          <small>Copyright © 2018 THE OPEN DESIGN SCHOOL. All Rights Reserved</small>
	        </div>
	      </div>
	    </footer>
        <!-- Logout Modal-->
	    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
	      <div class="modal-dialog" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title" id="logoutModalLabel">Ready to Leave?</h5>
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
	    <div class="modal fade" id="edit_contact" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
	      <div class="modal-dialog modal-dialog-centered" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title" id="contactModalLabel">Voulez vous enregistrer le contact du message n° <span id="n_msg"></span> ?</h5>
	            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">×</span>
	            </button>
	          </div>
	          <div class="modal-body">
				<section id="contact" class="col-12 ">
					<div class="main_container">
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
	    <!-- Upload Modal -->
	    <div class="modal fade" id="edit_uploads" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
	      <div class="modal-dialog modal-dialog-centered" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title" id="uploadModalLabel"></h5>
	            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">×</span>
	            </button>
	          </div>
	          <div class="modal-body">
				<div class="main_container">
					<form name="services" class="row no-gutters" action="" method="post" enctype="multipart/form-data">
						<div class="form-group col-12">
							<img alt="service" src="" style="display: none;" id="image">
							<input type="text" class="form-control" id="title" name="values[title]" aria-describedby="emailHelp" placeholder="Titre" autocomplete="off" required>
							<div id="link_holder"></div>
							<textarea id="text" name='values[text]' class='form-control' style='height: 200px;'></textarea>
							<input class='form-control' name="fileToUpload" type="file" autocomplete="off">
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
	    <!-- Sections Modal -->
	    <div class="modal fade" id="edit_section" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
	      <div class="modal-dialog modal-dialog-centered" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title" id="contactModalLabel"></h5>
	            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">×</span>
	            </button>
	          </div>
	          <div class="modal-body">
				<section id="contact" class="col-12 ">
					<div class="main_container">
						<form name="sections" class="row no-gutters" action="<?php echo htmlspecialchars(HOST.'set_section');?>" method="post">
							<div class="form-group col-12">
								<input type="text" class="form-control" id="item_text" name="values[item_text]" placeholder="Title" autocomplete="off" required>
								<input type="text" class="form-control" id="item_alias" name="values[item_alias]" placeholder="Alias" >
								<input type="text" class="form-control" id="item_link" name="values[item_link]" placeholder="Lien">
								<input type="number" class="form-control" id="parent" name="values[parent]" placeholder="# parent">
								<div class="custom-control custom-checkbox">
								  <input type="checkbox" class="custom-control-input" id="menu" name="values[menu]" value="1">
								  <label class="custom-control-label" for="menu">Visible</label>
								</div>
							</div>
						</form>
					</div>
				</section>
			  </div>
	          <div class="modal-footer">
	            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
	            <button class="btn btn-primary" type="button" onclick="document.sections.submit()">Enregistrer</button>
	          </div>
	        </div>
	      </div>
	    </div>	    
	   <!-- Delete Modal -->
	    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
	      <div class="modal-dialog modal-dialog-centered" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title" id="deleteModalLabel"></h5>
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