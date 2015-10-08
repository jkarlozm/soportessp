<?php

    //Reporte
    session_start();
	if (!isset($_SESSION['User'])) {
		header("Location:../index.html");
	}
	
    require ('../Conexion/conexion.php');
	
	//variables
	$usuario=$_GET['u'];		
	
	if (empty($_GET['d']) && empty($_GET['m']) && empty($_GET['s']) && empty($_GET['t']) && empty($_GET['a']) && empty($_GET['seis'])) {			
		echo "Selecciona un dia del calendario";
	} else {
		if (!empty($_GET['d'])){
		$dia = $_GET['d'];
		//consulta dia
		$recupera = "SELECT * FROM reporte WHERE atendio='$usuario' && DATE(reporte.Entrega)='$dia'";
		$objeto->consulta($recupera);
		echo  "Reporte del dia <br />
		Fecha: $dia <br />
		Atendio: $usuario <br />"; 
		}	
		if (!empty($_GET['s'])) {
			$semana = $_GET['s'];
			//consulta semana
			$recupera = "SELECT * FROM reporte WHERE atendio='$usuario' && WEEK(reporte.Entrega, 1)='$semana' && YEAR(reporte.Entrega)='$_GET[anisem]'";
			$objeto->consulta($recupera);
			echo "Reporte Semanal <br />
			Semana: $semana <br />
			Año: $_GET[anisem] <br />
			Atendio: $usuario <br />";
		}	
		
		if (!empty($_GET['m'])) {		
			$mes=$_GET['m'];		
			//consulta mes
			$recupera = "SELECT * FROM reporte WHERE atendio='$usuario' && MONTH(reporte.Entrega)='$mes' && YEAR(reporte.Entrega)='$_GET[anim]'";
			$objeto->consulta($recupera);
			switch ($mes) {
				case '1':
					$mes = "Enero";
					break;
				case '2':
					$mes = "Febrero";
					break;
				case '3':
					$mes = "Marzo";
					break;
				case '4':
					$mes = "Abril";
					break;
				case '5':
					$mes = "Mayo";
					break;
				case '6':
					$mes = "Junio";					
					break;
				case '7':
					$mes = "Julio";
					break;
				case '8':
					$mes = "Agosto";
					break;
				case '9':
					$mes = "Septiembre";
					break;
				case '10':
					$mes = "Octubre";
					break;
				case '11':
					$mes = "Noviembre";
					break;
				case '12':
					$mes = "Diciembre";
					break;
			}
			echo "Reporte mensual <br />
			Mes: $mes <br />
			Año: $_GET[anim] <br />
			Atendio: $usuario <br />";		
		}
		
		if (!empty($_GET['t'])) {
			$trimestre=$_GET['t'];		
			//consulta trimestre				
			$recupera = "SELECT * FROM reporte WHERE atendio='$usuario' &&  QUARTER(reporte.Entrega)='$trimestre' && YEAR(reporte.Entrega)='$_GET[anit]'";
			$objeto->consulta($recupera);
			echo "Reporte trimestral <br />
			Trimestre: $trimestre <br />
			Año: $_GET[anit] <br />
			Atendio: $usuario <br />";
		}	
		
		if (!empty($_GET['a'])) {
			$anio = $_GET['a'];
			//anio
			$recupera = "SELECT * FROM reporte WHERE atendio='$usuario' && year(reporte.Entrega)='$anio'";
			$objeto->consulta($recupera);
			echo "Reporte anual <br />
			Año: $anio <br/>
			Atendio: $usuario <br />";
		}
		
		if (!empty($_GET['seis'])) {
			$semestre = $_GET['seis'];
			//semestre
			if ($semestre==1) {
				$recupera = "SELECT * FROM reporte WHERE atendio='$usuario' && MONTH(reporte.Entrega)<='6' && YEAR(reporte.Entrega)='$_GET[anis]'";
			}
			else {
				$recupera = "SELECT * FROM reporte WHERE atendio='$usuario' && MONTH(reporte.Entrega)>='7' && YEAR(reporte.Entrega)='$_GET[anis]'";
			}
			$objeto->consulta($recupera);
			echo "Reporte semestral <br />
			semestre: $semestre <br />
			Año: $_GET[anis] <br />
			Atendio: $usuario <br />";
		}

		$numren = $objeto->contarRenglones();
		
		if ($numren==0) {
			echo "<br />No hay datos";
		} else {
			//id=tabla	
			echo "			
			<br />
			<div class='row text-right animated shake' id='botones'>
			<botton type='botton' class='btn btn-default' onclick='javascript: window.print()'><span style='color: blue;' class='glyphicon glyphicon-print'></span> Imprimir</botton>
			</div>
			Servicios realizados: $numren
			<br />
			<table class='table table-condensed'> 
				<tr>
					<thead>
						<th>Folio</th>
						<th>Recepci&oacuten</th>
						<th>Entrega</th>				
						<th>Servicio</th>
						<th>Usuario</th>
						<th>Problema</th>
						<th>Solucion</th>
					<thead>
				</tr>";
			while ($fila=$objeto->extraer_registros()) {		
				echo "<tr>
				<td>$fila[0]</td>
				<td>$fila[1]</td>
				<td>$fila[2]</td>				
				<td>$fila[4]</td>
				<td>$fila[5]</td>
				<td>$fila[6]</td>
				<td>$fila[7]</td>
				</tr>";		
			}
		echo "</table>
		<br />";
		}
	}
	$objeto -> desconectar_base_datos();			
?>