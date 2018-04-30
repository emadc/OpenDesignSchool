		<div class="container">
			<header class="row justify-content-xl-center fixed-top no-gutters" id="target">
				<div class="col-xl-9 header_container">
					<nav class="navbar navbar-expand-lg navbar-dark">
						<a class="navbar-brand" href="<?php echo HOST;?>home">
							<img alt="" src="<?php echo HOST;?>/assets/img/logo.png" />
						</a>
					</nav>
				</div>
			</header>
			<div class="card card-register mx-auto">
				<div class="card-header">Register an Account</div>
				<div class="card-body">
					<form>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-6">
									<label for="exampleInputName">First name</label>
									<input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter first name">
								</div>
								<div class="col-md-6">
									<label for="exampleInputLastName">Last name</label>
									<input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Enter last name">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-6">
									<label for="exampleInputPassword1">Password</label>
									<input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
								</div>
								<div class="col-md-6">
									<label for="exampleConfirmPassword">Confirm password</label>
									<input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirm password">
								</div>
							</div>
						</div>
						<a class="btn btn-primary btn-block" href="login.html">Register</a>
					</form>
					<div class="text-center">
						<a class="d-block small mt-3" href="<?php echo HOST?>login">Login Page</a>
						<a class="d-block small" href="<?php echo HOST?>forgot">Forgot Password?</a>
					</div>
				</div>
			</div>
		</div>