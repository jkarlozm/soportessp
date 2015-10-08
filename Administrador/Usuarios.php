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

		<title>Usuarios</title>
		<meta name="description" content="">
		<meta name="author" content="Karloz">
		
		<!--Funciones-->
		<script type="text/javascript" src="../js/Funciones2.js"></script>

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
				<div class="col-md-11 text-center">
					<table class="table table-condensed table-hover">
						<tr>
							<thead>
								<th>Id</th>
								<th>Nombre</th>
								<th>Nickname</th>
								<th>Tipo Cuenta</th>
								<th>Cambiar Contraseña</th>
								<th>Modificar</th>
								<th>Eliminar</th>
							</thead>
						</tr>
						<?php
							require '../Conexion/conexion.php';
							
							$cons = "SELECT * FROM registro";
							$objeto -> consulta($cons);
							while ($fila = $objeto -> extraer_registros()) {
								echo "<tr>
								<tbody>
									<td>$fila[0]</td>
									<td>$fila[2]</td>
									<td>$fila[1]</td>
									<td>$fila[4]</td>
									<td><input id='$fila[0]' class='btn btn-primary' type='button' value='Contraseña' data-toggle='modal' data-target='#Contraseña' onclick='pasarId(this.id)' /></td>
									<td><input id='$fila[0]' class='btn btn-success' type='button' value='Modificar' data-toggle='modal' data-target='#datosUser' onclick='actualizarDatos(this.id)' /></td>
									<td><input id='$fila[0]' class='btn btn-danger' type='button' value='Eliminar' onclick='eliminaruser(this.id)' /></td>
								</tbody>
								</tr>";	
							}							
						?>
					</table>
				</div>
			</div>
			
			<div class="modal fade" id="datosUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div style="color: black;" class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4>Actualizar Datos</h4>							
						</div>
						<div class="modal-body">
							<form>
								<input type="hidden" id="iduser" />
								<div class="form-group">
									<input type="text" placeholder="Nombre Completo" class="form-control" id="Actnom" />
								</div>
								<div class="form-group">
									<input type="text" placeholder="Nickname" class="form-control" id="Actnick" />
								</div>
								<div class="form-group">
									<select class="form-control" id="Acttc">
										<option value=""></option>
										<option value="Estandar">Estandar</option>
										<option value="Administrador">Administrador</option>
									</select>
								</div>																
								<input type="button" value="Actualizar" data-dismiss="modal" aria-label="Close" class="btn btn-default" onclick="ActualizarUser()" />								
							</form>
						</div>						
					</div>
				</div>
			</div>			
		</div>
	</body>
</html>
