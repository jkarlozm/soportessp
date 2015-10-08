<?php	
    //Reporte
    session_start();
	if (!isset($_SESSION['User'])) {
		header("Location:../index.html");
	}
	
    require ('../Conexion/conexion.php');				
	
	if (empty($_GET['d']) && empty($_GET['m']) && empty($_GET['s']) && empty($_GET['t']) && empty($_GET['a']) && empty($_GET['seis'])) {			
		echo "Selecciona un dia del calendario";
	} else {
		if (!empty($_GET['d'])){
		$dia = $_GET['d'];
		//consulta dia
		$recupera = "SELECT * FROM reporte WHERE DATE(reporte.Entrega)='$dia'";
		if ($objeto->consulta($recupera)) {
			echo  "Reporte del dia <br />
			Fecha: $dia";
		}
		else {
			echo "Hay un ERROR en la consulta";
		}
		 
		}	
		if (!empty($_GET['s'])) {
			$semana = $_GET['s'];
			//consulta semana
			$recupera = "SELECT * FROM reporte WHERE WEEK(reporte.Entrega, 1)='$semana' && YEAR(reporte.Entrega)='$_GET[anisem]'";				
			if($objeto->consulta($recupera)){
				echo "Reporte Semanal <br />
				Semana: $semana <br />";
			}
			else {
				echo "Hay un ERROR en la consulta";
			}
		}	
		
		if (!empty($_GET['m'])) {		
			$mes=$_GET['m'];		
			//consulta mes
			$recupera = "SELECT * FROM reporte WHERE MONTH(reporte.Entrega)='$mes' && YEAR(reporte.Entrega)='$_GET[anim]'";
			if($objeto->consulta($recupera)){
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
				echo "Reporte Mensual <br />
				Mes: $mes <br />";
			}
			else {
				echo "Hay un ERROR en la consulta";
			}		
		}
		
		if (!empty($_GET['t'])) {
			$trimestre=$_GET['t'];		
			//consulta trimestre				
			$recupera = "SELECT * FROM reporte WHERE QUARTER(reporte.Entrega)='$trimestre' && YEAR(reporte.Entrega)='$_GET[anit]'";
			if($objeto->consulta($recupera)){
				echo "Reporte Trimestral <br />
				Trimestre: $trimestre <br />";
			}
			else {
				echo "Hay un ERROR en la consulta";
			}
		}	
		
		if (!empty($_GET['a'])) {
			$anio = $_GET['a'];
			//anio
			$recupera = "SELECT * FROM reporte WHERE year(reporte.Entrega)='$anio'";
			if($objeto->consulta($recupera)){
				echo "Reporte Anual <br />
				Año: $anio <br/>";
			}
			else {
				echo "Hay un ERROR en la consulta";
			}
		}
		
		if (!empty($_GET['seis'])) {
			$semestre = $_GET['seis'];
			//semestre
			if ($semestre==1) {
				$recupera = "SELECT * FROM reporte WHERE MONTH(reporte.Entrega)<='6' && YEAR(reporte.Entrega)='$_GET[anis]'";
			}
			else {
				$recupera = "SELECT * FROM reporte WHERE MONTH(reporte.Entrega)>='7' && YEAR(reporte.Entrega)='$_GET[anis]'";
			}
			if($objeto->consulta($recupera)){
				echo "Reporte Semestral <br />
				semestre: $semestre <br />";
			}
			else {
				echo "Hay un ERROR en la consulta";
			}
		}

		if($objeto -> consulta($recupera)==FALSE){
			
		}
		else {
			$numren = $objeto->contarRenglones();
			
			if ($numren==0) {
				echo "<br />No hay datos";
			} else {
				//id=tabla	
				echo "				
				<br />
				<div class='row text-right animated shake' id='botones'>
					<botton class='btn btn-default' onclick='javascript: window.print()'><span style='color: blue;' class='glyphicon glyphicon-print'></span> Imprimir</botton>
				</div>
				Servicios realizados: $numren <br />
				<table class='table table-condensed largotabla'> 
					<tr>
					<thead>
						<th>Folio</th>
						<th>Atendio</th>
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
						<tbody>
							<td>$fila[0]</td>
							<td>$fila[3]</td>
							<td>$fila[1]</td>
							<td>$fila[2]</td>				
							<td>$fila[4]</td>
							<td>$fila[5]</td>
							<td>$fila[6]</td>
							<td>$fila[7]</td>
						<tbody>
					</tr>";		
				}
			echo "</table>";
			}
		}
	}
	$objeto -> desconectar_base_datos();			
?>