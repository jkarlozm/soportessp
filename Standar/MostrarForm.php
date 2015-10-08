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
	
	  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame Remove this if you use the .htaccess -->
	  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	  <title>form</title>
	  <meta name="description" content="">
	  <meta name="author" content="Karloz">
	  
	  <!--Funciones-->
	  <script type="text/javascript" src="../js/Funciones.js"></script>  
	
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  
	</head>	
	
	<body>
		<div id="botones" class="text-right animated shake">
			<button type="button" class="btn btn-default" onclick="javascript: window.print()"><span style="color: blue;" class="glyphicon glyphicon-print"></span> Imprimir</button>			
		</div>
		<br />
		<div class="container">			 	
		    <table class="table table-condensed largotabla">
				<tr>
					<th colspan="2">
						<div class="row text-right">
							<div class="col-md-8">
								<label>Folio:</label>
							</div> 
							<div class="col-md-3 form-group">
								<input class="form-control" type="text" id="Idfolio" readonly="readonly" />							
							</div>
						</div>
					</th>
				</tr>
				<tr>
					<td>
						<div class="row">
							<div class="col-md-3">
								<label>Recepcion:</label>
							</div>
							<div class="col-md-8 form-group"> 
								<input class="form-control" type="text" id="Recepcion" readonly="readonly"/>
							</div>
						</div>
						<div class="row">																
							<div class="col-md-3">
								<label>Estado:</label>
							</div>
							<div class="col-md-8 form-group"> 
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
								<label>Entrega:</label>
							</div>
							<div class="col-md-8 form-group"> 
								<input class="form-control" type="text" id="Entrega" readonly="readonly" />
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
								<label>Usuario:</label>
							</div>
							<div class="col-md-8 form-group"> 
								<input class="form-control" type="text" id="UserComp" readonly="readonly"/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">	 
								<label>Departamento:</label>
							</div>
							<div class="col-md-8 form-group"> 
								<input class="form-control" type="text" id="Departamento" readonly="readonly"/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>Direccion:</label>
							</div>
							<div class="col-md-8 form-group"> 
								<input type="text" id="Direccion" name="direccion" class="form-control" readonly="readonly" />								
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
								<label>Equipo:</label>
							</div>
							<div class="col-md-8 form-group">
								<input class="form-control" id="EquipoUser" type="text" name="equipouser" readonly="readonly" />								
							</div>
						</div>
						<div class="row">
							<div class="col-md-3"> 
								<label>Marca:</label>
							</div>
							<div class="col-md-8 form-group">
								<input class="form-control" type="text" id="Marca" readonly="readonly"/>
							</div>
						</div>											
					</td>
					<td>
						<div class="row">
							<div class="col-md-3">
								<label>Serie:</label>
							</div>
							<div class="col-md-8 form-group">
								<input class="form-control" type="text" id="Serie" readonly="readonly"/>
							</div>
						</div>
						<div class="row"> 
								<div class="col-md-3">
									<label>Modelo: </label>
								</div>
								<div class="col-md-8 form-group">	
									<input class="form-control" type="text" id="Modelo" readonly="readonly"/>
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
								echo "<input type='radio' id='$valor[Servicio]' name='Servicio' value='$valor[Servicio]' />$valor[Servicio]&nbsp"; 
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
								<label>Problema:</label>
							</div>
							<div class="col-md-8 form-group"> 
								<input class="form-control" type="text" id="Problema" readonly="readonly"/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>Diagnostico:</label>
							</div>
							<div class="col-md-8 form-group">
								<input class="form-control" type="text" id="Diagnostico" readonly="readonly"/>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<label>Solucion:</label>
							</div>
							<div class="col-md-8 form-group">
								<input class="form-control" type="text" id="Solucion" readonly="readonly"/>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="row">
							<div class="col-md-3">
								<label>Personal que atendio el servicio:</label>
							</div>
							<div class="col-md-8 form-group">					
								<input class="form-control" type="text" id="Atendio" readonly="readonly" />
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="row">
							<div class="col-md-3">
								<label>Observaciones:</label>
							</div> 
							<div class="col-md-8 form-group">
								<input class="form-control" type="text" id="Observaciones" readonly="readonly"/>
							</div>
						</div>
					</td>
				</tr>											
			</table>			
		</div>  
	</body>
</html>
