<?php
	session_start();
	if (!isset($_SESSION['User'])) {
		header("Location:../index.html");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Busqueda</title>
		<meta name="description" content="">
		<meta name="author" content="Karloz">
		
		<!--Jquery-->
		<script type="text/javascript" src="../js/Funciones.js"></script>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	</head>

	<body>
		<div class="container">
			<div class="row" id="encabezado">
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
			<nav>
				
			</nav>

			<div class="row separadortitulo" id="espacio">
				<div class="col-md-2" id="botones">
					<form>
						<div class="form-group">							
							<input type="text" id="Usuario" class="form-control" placeholder="Usuario" />
							<input type="text" id="Folio" class="form-control" placeholder="Folio"/>
						</div>
						<button type="button" class="btn btn-default" onclick="proBuscar()"><span class="glyphicon glyphicon-search"></span> Buscar</button>						
					</form>
				</div>
				<div class="col-md-10">
					<div id="Datos">
						<div class="col-md-9 text-center">
							<img src="../Image/Buscar.png" width="250px" />
						</div>
					</div>
				</div>	
			</div>		
		</div>
	</body>
</html>
