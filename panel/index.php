<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesion - El Profesor Panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-black">
<div class="container-fluid mt-5">
	<div class="row d-flex justify-content-center align-items-center">
		<div class="col-md-4 col-12">
			<img src="logo.png" alt="https://t.me/ElMariCard" class="w-100">
			<form action="" method="POST"  onsubmit="return do_login();" class="login_form mt-3">
				<div class="row">
					<div class="col-12">
						<div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="error_alert">
							<strong id="error_message">Error</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
					<div class="col-12">
						<label for="token">CONTRASEÑA</label>
					</div>
					<div class="col-12">
						<input type="text" name="token" id="token">
					</div>
					<div class="col-6 mt-3 d-flex justify-content-start">
						<button class="button">INGRESAR</button>
					</div>
					<div class="col-6 mt-3 d-flex justify-content-end">
						<a href="https://t.me/ElMariCard" target="_blank"><img src="telegram.png">TELEGRAM</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://malsup.github.com/jquery.form.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>
<script src="js/login.js"></script>
</body>
</html>