				<section id="bottom" class="text-center">
					<h2><?php echo $bottom->getTitle();?></h2>
					<p><?php echo $bottom->getText();?></p>
					<?php if (!empty($bottom->getImage())) echo "<a href='".HOST.$bottom->getLink()."'><img alt='Bas de page' src='".UPOLOAD_URL.$bottom->getImage()."'></a>";?>
				</section>			
			</main>
			<footer class="row justify-content-center text-center no-gutters">
<?php	foreach ($footer as $footerItem):
			if ($footerItem->getTitle()!="<%>copyright<%>"):?>
				<div class="col-md-2 col-sm-12">
					<h3><?php echo $footerItem->getTitle();?></h3>
					<p><?php echo $footerItem->getText();?></p>
					<p><?php echo $footerItem->getSocials();?></p>
				</div>
			<?php else:?>
				<div class="col-md-12 text-center">
				    <div class="copy">
				    	<p><?php echo $footerItem->getText();?></p>
				    </div>
				</div>
<?php 		endif;
		endforeach;?>
			</footer>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="ModalCenterTitle">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
					<img class="img-fluid" src="">	        
		      </div>
		    </div>
		  </div>
		</div>
		<!-- Bootstrap core JavaScript-->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1w31v23vOrihp8-YYLgqzZB_q4NEV6jg&callback=initMap" async defer></script>
		<script src="<?php echo ASSETS;	?>js/script.js"></script>
	</body>
</html>