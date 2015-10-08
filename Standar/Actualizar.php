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
	    <div class="container">
	    	<div class="row">    		
	    		<div class="col-md-11">    			
					<table class="table table-condensed" style="width: 52%; color: black; ">
						<tr>
							<th>
								<div class="row text-right">
									<div class="col-md-8">
										<label>Folio:</label>
									</div>
									<div class="col-md-3"> 
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
									<div class="col-md-8"> 
										<input class="form-control" type="text" id="Recepcion" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">																
										<label>Estado:</label>
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
								<div class="row">
									<div class="col-md-3">
										<label>Entrega:</label>
									</div>
									<div class="col-md-8">
										<input class="form-control" type="text" id="Entrega" />
									</div>
								</div>								
							</td>						
						</tr>
						<tr>
							<th>Datos de Usuario</th>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-md-3">
										<label>Usuario:</label>
									</div>
									<div class="col-md-8">
										<input class="form-control" type="text" id="UserComp" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">  
										<label>Departamento:</label>
									</div>
									<div class="col-md-8">
										<input class="form-control" type="text" id="Departamento" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<label>Direccion:</label>
									</div>
									<div class="col-md-8">
										<input type="text" id="Direccion" class="form-control" name="direccion" />										
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<th>Datos Equipo</th>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-md-3">								
										<label>Equipo:</label>
									</div>
									<div class="col-md-8">
										<input type="text" id="EquipoUser" name="equipouser" class="form-control" />										
									</div>
								</div>
								<div class="row">
									<div class="col-md-3"> 
										<label>Marca:</label>
									</div>
									<div class="col-md-8">
										<input class="form-control" type="text" id="Marca" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<label>Serie:</label>
									</div>
									<div class="col-md-8">
										<input class="form-control" type="text" id="Serie" />
									</div>
								</div>
								<div class="row"> 
									<div class="col-md-3">
										<label>Modelo:</label>
									</div>
									<div class="col-md-8">
										<input class="form-control" type="text" id="Modelo" />
									</div>
								</div>						
							</td>						
						</tr>
						<tr>
							<th>Tipo de Servicio</th>
						</tr>
						<tr>							
							<td class="text-center">
								<?php
									$resultado = $con -> radioSer();
									foreach ($resultado as $valor) {
										echo "<input type='radio' id='$valor[Servicio]' name='Servicio' value='$valor[Servicio]' />$valor[Servicio]&nbsp"; 
									}							
								?>
							</td>
						</tr>
						<tr>
							<th>Diagnostico</th>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-md-3">
										<label>Problema:</label>
									</div>
									<div class="col-md-8">
										<input class="form-control" type="text" id="Problema" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<label>Diagnostico:</label>
									</div>
									<div class="col-md-8">
										<input class="form-control" type="text" id="Diagnostico" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<label>Solucion:</label> 
									</div>
									<div class="col-md-8">
										<input class="form-control" type="text" id="Solucion" />
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div>
									<div class="col-md-3">
										<label>Personal que atendio el servicio:</label>
									</div>
									<div class="col-md-8">
										<input class="form-control" type="text" id="Atendio" readonly="readonly" />
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="row">
									<div class="col-md-3">
										<label>Observaciones:</label>
									</div>
									<div class="col-md-8">
										<input class="form-control" type="text" id="Observaciones"/>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td><input type="button" value="Actualizar" class="btn btn-default" onclick="actualizarRegistro()" /></td>
						</tr>					
					</table>
				</div>    		
	    	</div>
	    	<div id="resultado"> </div>
	    </div>  
	</body>
</html>
