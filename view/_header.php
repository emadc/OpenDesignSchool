			<header class="row justify-content-xl-center fixed-top no-gutters" id="target">
				<div class="col-xl-9 header_container">
					<nav class="navbar navbar-expand-lg navbar-dark">
						<a class="navbar-brand" href="<?php echo HOST;?>home"><img alt="" src="<?php echo HOST;?>/assets/img/logo.png"/></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarCollapse">
							<ul class="navbar-nav ml-auto">
								<?php foreach ($menu as $itemMenu):?>
									<li class="nav-item <?php echo $template==$itemMenu->getItemLink()?'active':''?>">
										<a class="nav-link" href="<?php echo HOST.$itemMenu->getItemLink();?>">
											<?php echo $itemMenu->getItemText();?>
										</a>
									</li>
								<?php endforeach;?>
							</ul>
						</div>
					</nav>
				</div>					
			</header>
			<!--- cotent ---->
			<main class="row justify-content-center no-gutters">
