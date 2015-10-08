<?php
	session_start();
	if(!isset($_SESSION['User'])){
		header("Location:../index.php");		
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>FormContrasena</title>
		<meta name="description" content="">
		<meta name="author" content="Karloz">
		
		<!--Funciones-->
		<script type="text/javascript" src="../js/Funciones2.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	</head>

	<body>
		<div class="container">
			<div class="col-md-11">
				<form style="width: 50%">
					<input type="hidden" id="idu" value="<?php echo $_GET['di'] ?>" />
					<div class="form-group">
						<input type="password" placeholder="Nueva Contraseña" class="form-control" id="c1" />
					</div>
					<div class="form-group">
						<input type="password" placeholder="Repita Contraseña" class="form-control" id="rc" />
					</div>																				
					<input type="button" value="Guardar" data-dismiss="modal" aria-label="Close" class="btn btn-default" onclick="nContrasena()" />							
				</form>
			</div>			
		</div>
	</body>
</html>
