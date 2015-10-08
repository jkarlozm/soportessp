<?php
	session_start();
	if (!isset($_SESSION['User'])) {
		header("Locarion:../index.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>RegistrarUsuario</title>
		<meta name="description" content="">
		<meta name="author" content="Karloz">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	</head>

	<body>
		<div class="container">
			<div class="row">
				<header>
					<section>
						<div class="row">
							<div class="col-md-3 inlineblock">
								<article>
									<img src="../Image/2.png" class="col-md-8 quitar-float igrande" />
								</article>
							</div>
							<div class="col-md-6 text-center inlineblock">
								DESARROLLO INSTITUCIONAL Y ADMINISTRACION POLICIAL<br />
								Departamento de Desarrollo Tecnologico
							</div>
							<div class="col-md-3 inlineblock">
								<article>
									<img src="../Image/gob.png" class="col-md-8 quitar-float igrande" />
								</article>
							</div>
						</div>
					</section>
				</header>
			</div>					

			<div class="row separadortitulo">
				<div class="col-md-2">
					<div class="form-group">
						<input type="button" class="btn btn-default largoboton" name="Registrar" value="Registrar" onclick="proRegistro()" />
					</div>					
					<div class="form-group">
					<input type="button" class="btn btn-default largoboton" name="Nuevo" value="Nuevo" onclick="proNuevo()"/>
					</div>
				</div>
				<div class="col-md-10">
					<div class="row container text-center">
						<form style="width: 60%">
							<div class="form-group">
								<input type="text" class="form-control" name="Nombre" placeholder="Nombre Completo" id="namec" />
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="Nickname" placeholder="Nickname" id="nName" />
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="contrasena1" placeholder="Contraseña" id="pass1" /><br />
								<input type="password" class="form-control" name="contrasena2" placeholder="Contraseña" id="pass2" />
							</div>
							<div class="form-group">
								<select name="tipocuenta" class="form-control" id="stc">
									<option value=""></option>
									<option value="Estandar">Estandar</option>
									<option value="Administrador">Administrador</option>
								</select>
							</div>
						</form>
					</div>
				</div>
			</div>			
		</div>
	</body>
</html>
