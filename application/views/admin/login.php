
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Admin Buletin</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

	<link rel="stylesheet" href="<?= base_url();?>assets/plugins/fontawesome-free/css/all.min.css">

	<link rel="stylesheet" href="<?= base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

	<link rel="stylesheet" href="<?= base_url();?>assets/dist/css/adminlte.min.css?v=3.2.0">
</head>
<body class="hold-transition login-page">
	<div class="login-box">

		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="#" class="h1"><b>BULETIN - PFID</b></a>
			</div>
			<div class="card-body">
				<?= $this->session->flashdata('psn'); ?>
				<p class="login-box-msg">Sign in to start your session</p>
				<form action="<?= base_url(); ?>admin/login/prosesLogin" method="post">
					<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
					<div class="input-group mb-3">
						<input type="text" class="form-control" name="username"  placeholder="Username">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" name="password" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
							<div class="icheck-primary">
								<input type="checkbox" id="remember">
								<label for="remember">
									Remember Me
								</label>
							</div>
						</div>

						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>

					</div>
				</form>
			</div>

		</div>

	</div>


	<script src="<?= base_url();?>assets/plugins/jquery/jquery.min.js"></script>

	<script src="<?= base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="<?= base_url();?>assets/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>
</html>
