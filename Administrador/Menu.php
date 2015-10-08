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

		<title>Menu</title>
		<meta name="description" content="Menu">
		<meta name="author" content="Karloz">	
		
		<!--Jquery-->
		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
		
		<!--Funciones-->
		<script type="text/javascript" src="../js/Funciones2.js"></script>		
		
		<!--Hoja Estilo-->		
		<link rel="stylesheet" type="text/css" href="../Css/menuone.css" />
		<link rel="stylesheet" type="text/css" href="../Css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="../Css/main.css"/>
		<link rel="stylesheet" type="text/css" href="../Css/imprimir.css" media="print" />
		<link rel="stylesheet" type="text/css" href="../Css/datepicker.css" />
		<link rel="stylesheet" type="text/css" href="../Css/animate.min.css"/>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	</head>

	<body>
		<div>
			<header>
				
			</header>
			
			<div id='cssmenus'>
			<ul>
			   <li><a href='#' id="RegUser"><span>Registrar Usuario</span></a></li>
			   <li><a href='#' id="VerUsers"><span>Usuarios</span></a></li>
			   <li><a href='#' id="RepTodos"><span>Reportes</span></a></li>			   
			   <li class="last active"><a href='../AccionesBD/sesionclose.php'><span>Salir</span></a></li>
			   <label>Bienvenido: <?php echo $_SESSION['User']; ?></label>		   
			</ul>
			</div>			

			<div class="espacioarriba" id="destino">
				<div class="container">
					<div class="row text-center">
						<img src="../Image/inicio.jpg" width="70%" />
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="Contraseña" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div style="color: black;" class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4>Cambiar Contraseña</h4>							
						</div>
						<div id="cuerpoModal" class="modal-body">
							
						</div>						
					</div>
				</div>
			</div>

			<footer class="container text-center">				
					&copy; Copyright Sistema Realizado por Los Alumnos de La universidad Tecnológica de Puebla				
			</footer>
		</div>
	</body>
</html>
