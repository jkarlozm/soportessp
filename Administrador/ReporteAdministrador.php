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

		<title>ReporteEstandar</title>
		<meta name="description" content="">
		<meta name="author" content="Karloz">
		
		<!--funciones-->
		<script type="text/javascript" src="../js/Funciones2.js"></script>
		<script>
			$(function () {
			  $('#fecha').datepicker({
			  	format: 'yyyy/mm/dd',
			  })
			});
		</script>		

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
			
			<input type="hidden" id="User" value="<?php echo $_SESSION['User']; ?>" />
			<div class="row separadortitulo">
				<div class="col-md-3 nolista" id="botones">
					<nav>
						<ul>
							<li> 
								<div>
									<input class="btn btn-primary largoboton" type="button" value="Reporte Diario" onclick="if (this.parentNode.nextSibling.childNodes[0].style.display != '') { this.parentNode.nextSibling.childNodes[0].style.display = ''; this.value = 'Reporte Diario'; } else { this.parentNode.nextSibling.childNodes[0].style.display = 'none'; this.value = 'Reporte Diario'; }" />
								</div><div><div style="display: none;">
									<form>
										<div class="form-group">
											<input type="text" name="date" id="fecha" class="form-control datepicker" placeholder="Selecciona Día" />																				
											<input type="button" class="btn btn-default" name="btnrd" value="Reporte" onclick="Reportedia()"/>
										</div>
									</form>
								</div></div>
							</li>
							<li> 
								<div>
									<input class="btn btn-primary largoboton" type="button" value="Reporte Semanal" onclick="if (this.parentNode.nextSibling.childNodes[0].style.display != '') { this.parentNode.nextSibling.childNodes[0].style.display = ''; this.value = 'Reporte Semanal'; } else { this.parentNode.nextSibling.childNodes[0].style.display = 'none'; this.value = 'Reporte Semanal'; }" />
								</div><div><div style="display: none;">
									<form>
										<div class="form-group">
											<label>Seleccione Semana: </label>
											<select name="selectsemana" id="sSemana" class="form-control" >
												<?php
													for ($i=1; $i <= 53; $i++) { 
														echo '<option value="'.$i.'">'.$i.'</option>';
													}
												?>
											</select><br />
											<label>Selecciona Año: </label><br />
											<select name="selectanio" id="seansem" class="form-control">
											<?php
												for ($i=date('Y'); $i>=2000; $i--) { 
													echo '<option value="'.$i.'">'.$i.'</option>';
												}
											?>							
											</select><br />								
											<input type="button" value="Reporte" name="btnrs" onclick="Reportesemana()" class="btn btn-default" />
										</div>
									</form>					
								</div></div>
							</li>
							<li> 
								<div>
									<input class="btn btn-primary largoboton" type="button" value="Reporte Mensual" onclick="if (this.parentNode.nextSibling.childNodes[0].style.display != '') { this.parentNode.nextSibling.childNodes[0].style.display = ''; this.value = 'Reporte Mensual'; } else { this.parentNode.nextSibling.childNodes[0].style.display = 'none'; this.value = 'Reporte Mensual'; }" />
								</div><div><div style="display: none;">
									<form>
										<div class="form-group">
											<label>Seleccione Mes: </label><br />
											<select name="mes" id="emes" class="form-control">								
												<option value="1">Enero</option>
												<option value="2">Febrero</option>
												<option value="3">Marzo</option>   
												<option value="4">Abril</option>
												<option value="5">Mayo</option>
												<option value="6">Junio</option>
												<option value="7">Julio</option>
												<option value="8">Agosto</option>
												<option value="9">septiembre</option>
												<option value="10">Octubre</option>
												<option value="11">Noviembre</option>
												<option value="12">Diciembre</option>
											</select><br />
											<label>Selecciona Año: </label><br />
											<select name="selectanio" id="seanm" class="form-control" >
												<?php
													for ($i=date('Y'); $i>=2000; $i--) { 
														echo '<option value="'.$i.'">'.$i.'</option>';
													}
												?>								
											</select><br />									
											<input type="button" class="btn btn-default" name="btnrm" value="  Reporte  " onclick="Reportemes()"/>
										</div>
									</form>					
								</div></div>
							</li>
							<li> 
								<div>
									<input class="btn btn-primary largoboton" type="button" value="Reporte Trimestral" onclick="if (this.parentNode.nextSibling.childNodes[0].style.display != '') { this.parentNode.nextSibling.childNodes[0].style.display = ''; this.value = 'Reporte Trimestral'; } else { this.parentNode.nextSibling.childNodes[0].style.display = 'none'; this.value = 'Reporte Trimestral'; }" />
								</div><div><div style="display: none;">
									<form>
										<div class="form-group">
											<label>Selececciona Trimestre: </label><br />
											<select name="selectrimestre" id="Stri" class="form-control" >								
												<?php
													for ($i=1; $i<=4; $i++) { 
														echo '<option value="'.$i.'">'.$i.' trimestre'.'</option>';
													}
												?>
											</select><br />
											<label>Selecciona Año: </label><br />
											<select name="selectanio" id="seant" class="form-control">
												<?php
													for ($i=date('Y'); $i>=2000; $i--) { 
														echo '<option value="'.$i.'">'.$i.'</option>';
													}
												?>								
											</select><br />							
											<input type="button" name="btnrt" value="Reporte" class="btn btn-default" onclick="Reportetrimestre()"/>
										</div>
									</form>													
								</div></div>
							</li>
							<li>						 
								<div>
									<input class="btn btn-primary largoboton" type="button" value="Reporte Semestre" onclick="if (this.parentNode.nextSibling.childNodes[0].style.display != '') { this.parentNode.nextSibling.childNodes[0].style.display = ''; this.value = 'Reporte Semestre'; } else { this.parentNode.nextSibling.childNodes[0].style.display = 'none'; this.value = 'Reporte Semestre'; }" />
								</div><div><div style="display: none;">									
									<form>
										<div class="form-group">
											<label>Selecciona Semestre: </label><br />
											<select name="ssemestre" id="semestre" class="form-control">
												<option value="1">1 semestre</option>
												<option value="2">2 semestre</option>
											</select><br />
											<label>Selecciona Año: </label><br />
											<select name="selectanio" id="seans" class="form-control">
											<?php
												for ($i=date('Y'); $i>=2000; $i--) { 
													echo '<option value="'.$i.'">'.$i.'</option>';
												}
											?>									
											</select><br />							
											<input type="button" class="btn btn-default" name="btnrsm" value="Reporte" onclick="Reportesemestre()"/>
										</div>
									</form>													
								</div></div>
							</li>
							<li>						 
								<div>
									<input type="button" class="largoboton btn btn-primary" value="Reporte Anual" onclick="if (this.parentNode.nextSibling.childNodes[0].style.display != '') { this.parentNode.nextSibling.childNodes[0].style.display = ''; this.value = 'Reporte Anual'; } else { this.parentNode.nextSibling.childNodes[0].style.display = 'none'; this.value = 'Reporte Anual'; }" />
								</div><div><div style="display: none;">
									<form>
										<div class="form-group">
											<label>Selecciona Año: </label><br />
											<select name="selectanio" id="sa" class="form-control">
												<?php
													for ($i=date('Y'); $i>=2000; $i--) { 
														echo '<option value="'.$i.'">'.$i.'</option>';
													}
												?>					
											</select><br />							
											<input type="button" class="btn btn-default" name="btnra" value="Reporte" onclick="Reporteanual()"/>
										</div>
									</form>																				
								</div></div>
							</li>					
						</ul>
					</nav>
				</div>			

				<div class="col-md-9">
					<div id="respuesta">
						<div class="col-md-8 text-center">
							<img src="../Image/Reporte.png" />
						</div>	
					</div>
				</div>
			</div>			
		</div>
	</body>
</html>
