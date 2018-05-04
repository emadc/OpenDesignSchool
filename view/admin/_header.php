		<!-- Navigation-->
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
			<a class="navbar-brand" href="<?php echo HOST;?>admin"><img alt="" src="<?php echo HOST;?>/assets/img/logo.png"/></a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav navbar-sidenav" id="navbarAccordion">
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
						<a class="nav-link" href="admin">
							<i class="fa fa-fw fa-dashboard"></i>
							<span class="nav-link-text">Dashboard</span>
						</a>
					</li>
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
						<a class="nav-link" href="messages">
							<i class="fa fa-fw fa-envelope"></i>
							<span class="nav-link-text">Messages</span>
						</a>
					</li>
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
						<a class="nav-link" href="contacts">
							<i class="fa fa-fw fa-address-book"></i>
							<span class="nav-link-text">Contacts</span>
						</a>
					</li>
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
						<a class="nav-link" href="about">
							<i class="fa fa-hand-o-right"></i>
							<span class="nav-link-text">Qui sommes nous</span>
						</a>
					</li>
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
						<a  class="nav-link" href="services_admin" >
							<i class="fa fa-fw fa-handshake-o"></i>
							<span class="nav-link-text">Services</span>
						</a>
					</li>					
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#navbarAccordion">
							<i class="fa fa-fw fa-sitemap"></i>
							<span class="nav-link-text">Page accueil</span>
						</a>
						<ul class="sidenav-second-level collapse" id="collapseMulti">
							<li>
								<a href="#">menu</a>
							</li>
							<li>
								<a href="#">banner</a>
							</li>
							<li>
								<a href="#">bottom</a>
							</li>
							<li>
								<a href="#collapseMulti2">footer</a>
							</li>
						</ul>
					</li>										
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
						<a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#navbarAccordion">
							<i class="fa fa-fw fa-camera"></i>
							<span class="nav-link-text">Galerie</span>
						</a>
						<ul class="sidenav-second-level collapse" id="collapseComponents">
							<li>
								<a href="gallery"><i class="fa fa-picture-o"></i> preview</a>
							</li>
							<li>
								<a href="gallery-grid"><i class="fa fa-table"></i> list</a>
							</li>
							<li>
								<a href="gallery"><i class="fa fa-cloud-upload"></i> Téléverser</a>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="navbar-nav sidenav-toggler">
					<li class="nav-item">
						<a class="nav-link text-center" id="sidenavToggler">
							<i class="fa fa-fw fa-angle-left"></i>
						</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item dropdown" id="notif">
						<a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-fw fa-envelope"></i>
							<?php if(count($newMsgs) > 0 ) : ?>
								<span class="d-lg-none">
									Messages
									<span class="badge badge-pill badge-primary"><?php echo count($newMsgs) ?> New</span>
								</span>
								<span class="indicator text-primary d-none d-lg-block">
									<i class="fa fa-fw fa-circle"></i>
								</span>
							<?php else :?>
								<span class="d-lg-none">
									Messages
								</span>
							<?php endif;?>
						</a>
						<div class="dropdown-menu" aria-labelledby="messagesDropdown">
							<h6 class="dropdown-header">New Messages:</h6>
							<div class="dropdown-divider"></div>
							<?php foreach ($newMsgs as $newMsg):?>
								<div class="dropdown-item" data-target="#edit_contact" data-toggle="modal" data-source="message-read" data-id="<?php echo $newMsg->getId()?>" onclick="this.parentNode.removeChild(this)">
									<strong><?php echo $newMsg->getNomPrenom()?></strong>
									<span class="small float-right text-muted"><?php echo date('d-m-Y H\h m', strtotime($newMsg->getDateCreation()))?></span>
									<div class="dropdown-message small"><?php echo $newMsg->getMessage()?></div>
									<div class="dropdown-divider"></div>
								</div	>
							<?php endforeach;?>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item small" href="messages"><i class="fa fa-fw fa-envelope"></i> Voir tous les messages</a>
						</div>
					</li>
					<li class="nav-item">
						<div class="nav-link mr-lg-2">
							<i class="fa fa-user-circle" ></i> <?php echo $_SESSION['username']?>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="modal" data-target="#exampleModal">
							<i class="fa fa-fw fa-sign-out"></i>
							Logout
						</a>
					</li>
				</ul>
			</div>
		</nav>