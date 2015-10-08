<?php
	session_start();
	if (!isset($_SESSION['User'])) {
		header("Location:../index.html");
	}	
	require '../Conexion/Consultas.php';
	$con = new Consultas();	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<!--Funciones-->
		<script type="text/javascript" src="../js/Funciones.js"></script>									
		
		<script>
			$(function () {
			  $('.datepicker').datepicker({
			  	format: 'yyyy/mm/dd',
			  })
			});
		</script>		
		
		<title>Formulario</title>
		<meta name="description" content="Formulario Servicio de Soporte">
		<meta name="author" content="Karloz">

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
			
			<div class="row separadortitulo">
				<div id="botones" class="col-md-2">
					<div class="form-group">
						<input type="button" class="btn btn-default largoboton" name="Registrar" value="Registrar" onclick="proRegistro()" />
					</div>
					<div class="form-group">
						<input type="button" class="btn btn-default largoboton" name="Imprimir" value="Imprimir" onclick="javascript: window.print()" />
					</div>
					<div class="form-group">
					<input type="button" class="btn btn-default largoboton" name="Nuevo" value="Nuevo" onclick="proNuevo()"/>
					</div>
				</div>
				<div class="col-md-10">
					<table class="table largotabla table-condensed">
						<tr>
							<th colspan="2">
								<div class="row">
									<div class="col-md-8 text-right">
										<label>Folio: <label>
									</div>
									<div class="col-md-3">								 
										<input class="form-control" type="text" id="Idfolio" value="<?php echo isset($_SESSION['Idfolio'])?$_SESSION['Idfolio']:0;?>" readonly="readonly"/>
									</div>
								</div>
							</th>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-md-3">
										<label>Recepcion: </label>
									</div>
									<div class="col-md-8 form-group">
										<input class="datepicker form-control" name="date" type="text" id="Recepcion" />																				
									</div>									
								</div>
								<div class="row">
									<div class="col-md-3">																
										<label>Estado: </label>
									</div>
									<div class="col-md-8">
										<select class="form-control" id="Estado">
											<option value="0"></option>
											<?php
												$resultado = $con -> seleccionaEstado();								
												foreach ($resultado as $valor) {
													echo "<option value='".$valor[Estado]."'>".$valor[Estado]."</option>";
												}
											?>
										</select>
									</div>
								</div>																
							</td>
							<td>
								<div class="row">
									<div class="col-md-3">
										<label>Entrega: </label>
									</div>
									<div class="col-md-8">																				
										<input class="form-control datepicker" type="text" id="Entrega" />								
									</div>									
								</div>
							</td>
						</tr>
						<tr>
							<th colspan="2">Datos de Usuario</th>
						</tr>
						<tr>
							<td colspan="2">
								<div class="row">
									<div class="col-md-3">
										<label>Usuario: </label>
									</div>
									<div class="col-md-8 form-group">
										<input class="form-control" type="text" id="Usuario" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-3"> 
										<label>Departamento: </label>
									</div> 
									<div class="col-md-8 form-group">
										<input class="form-control" type="text" id="Departamento" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<label>Direccion: </label>
									</div> 
									<div class="col-md-8">
										<input type="text" id="Direccion" name="direccion" class="form-control" />
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th colspan="2">Datos Equipo</th>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-md-3">
										<label>Equipo: </label>
									</div>
									<div class="col-md-8 form-group">
										<input type="text" id="Equipo" name="equipo" class="form-control" />										
									</div>
								</div>
								<div class="row"> 
									<div class="col-md-3">
										<label>Marca: </label>
									</div>
									<div class="col-md-8 form-group"> 
										<input class="form-control" type="text" id="Marca" />
									</div>
								</div>						
							</td>
							<td>
								<div class="row">
									<div class="col-md-3">
										<label>Serie: </label>
									</div>
									<div class="col-md-8 form-group">
										<input class="form-control" type="text" id="Serie" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<label>Modelo: </label>
									</div>
									<div class="col-md-8 form-group">
										<input class="form-control" type="text" id="Modelo" />
									</div>
								</div>						
							</td>
						</tr>
						<tr>
							<th colspan="2">Tipo de Servicio</th>
						</tr>
						<tr>							
							<td colspan="2" class="text-center">
								<?php
									$resultado = $con -> radioSer();
									foreach ($resultado as $valor) {										 
										echo "<input type='radio' name='Servicio' value='$valor[Servicio]' if($valor[Servicio] == 'Otros') print checked=TRUE; />$valor[Servicio]&nbsp"; 
									}							
								?>
							</td>
						</tr>
						<tr>
							<th colspan="2">Diagnostico</th>
						</tr>
						<tr>
							<td colspan="2">
								<div class="row">									
									<div class="col-md-3">
										<label>Problema: </label> 
									</div>
									<div class="col-md-8 form-group">
										<input class="form-control" type="text" id="Problema" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<label>Diagnostico: </label> 
									</div>
									<div class="col-md-8 form-group">
										<input class="form-control" type="text" id="Diagnostico" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<label>Solucion: </label> 
									</div>
									<div class="col-md-8">
										<input class="form-control" type="text" id="Solucion" />
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<div class="row">
									<div class="col-md-3">
										<label>Personal que atendio el servicio: </label>
									</div>
									<div class="col-md-8"> 
										<input readonly="readonly" class="form-control" type="text" id="Atendio" value="<?php echo $_SESSION['User']; ?>"  />
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<div class="row">
									<div class="col-md-3">
										<label>Observaciones: </label>
									</div>
									<div class="col-md-8">								 
										<input type="text" id="Observaciones" class="form-control"/>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td><br />
								____________________________________________________<br />
								<div class="text-center" ><?php echo $_SESSION['User']; ?><br />
								Nombre y firma del personal que atendio el servicio.
								</div>
							</td>
							<td><br />
								____________________________________________________<br />
								<br />
								Nombre y frima del usuario que recibio el servicio.
							</td>
						</tr>
					</table>
				</div>
			</div>			

			<div id="resultado">

			</div>
			
		</div>
	</body>
</html>
