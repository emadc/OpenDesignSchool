		<div class="container">
			<header class="row justify-content-xl-center fixed-top no-gutters" id="target">
				<div class="col-xl-9 header_container">
					<nav class="navbar navbar-expand-lg navbar-dark">
						<a class="navbar-brand" href="<?php echo HOST;?>home"><img alt="" src="<?php echo HOST;?>/assets/img/logo.png"/></a>
					</nav>
				</div>					
			</header>	
			<div class="card card-login mx-auto">
				<div class="card-header">Login</div>
				<div class="card-body">
					<form action="<?php echo htmlspecialchars(HOST.'auth');?>" method="post">
						<div class="form-group">
							<label for="exampleInputEmail1">Login</label>
							<input class="form-control" id="exampleInputEmail1" name="values[login]" type="text" aria-describedby="emailHelp" placeholder="Login">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input class="form-control" id="exampleInputPassword1" name="values[password]" type="password" placeholder="Password">
						</div>
						<div class="form-group">
							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox">
									Remember Password
								</label>
							</div>
						</div>
						<input class="btn btn-primary btn-block" type="submit" value="Login"/>
					</form>
					<div class="text-center">
						<a class="d-block small mt-3" href="<?php echo HOST?>register">Register an Account</a>
						<a class="d-block small" href="<?php echo HOST?>forgot">Forgot Password?</a>
					</div>
				</div>
			</div>
		</div>