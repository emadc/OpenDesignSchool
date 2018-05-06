		<div class="container">
			<header class="row justify-content-xl-center fixed-top no-gutters" id="target">
				<div class="col-xl-9 header_container">
					<nav class="navbar navbar-expand-lg navbar-dark">
						<a class="navbar-brand" href="<?php echo HOST;?>home"><img alt="" src="<?php echo HOST;?>/assets/img/logo.png"/></a>
					</nav>
				</div>					
			</header>	
			<div class="card card-login mx-auto">
				<div class="card-header">Connexion</div>
				<div class="card-body">
					<form action="<?php echo htmlspecialchars(HOST.'auth');?>" method="post">
						<div class="form-group">
							<label for="exampleInputEmail1">Utilisateur</label>
							<input class="form-control" id="exampleInputEmail1" name="values[login]" type="text" aria-describedby="emailHelp" placeholder="Login">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Mot de passe</label>
							<input class="form-control" id="exampleInputPassword1" name="values[password]" type="password" placeholder="Password">
						</div>
						<input class="btn btn-primary btn-block" type="submit" value="Se connecter"/>
					</form>
				</div>
			</div>
		</div>