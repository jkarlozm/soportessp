<?php
    session_start();
	if (!isset($_SESSION['User'])) {
		header("Location:../index.php");
	}

	//libreria requerida jpraph
	require_once ('src/jpgraph.php');

	//Grafico de barras
	require_once ('src/jpgraph_bar.php');

	//conexion base de datos
	require ('../../Conexion/conexion.php');	
	
	$user = $_GET['atendio'];
	if (empty($_GET['d']) && empty($_GET['s']) && empty($_GET['m']) && empty($_GET['t']) && empty($_GET['a']) && empty($_GET['seis'])) {		
		echo "Selecciona un dia del calendario";
	}
	else {
		$sql = "SELECT * FROM tservicio ";
		$res = mysql_query($sql);
		
		//definimos formatos generales de la grafica		
		$graph = new Graph('900', '500', 'auto');
		$graph->SetScale('textlin');	
		
		if (!empty($_GET['d'])) {
			$dia = $_GET['d'];		
			while ($row = mysql_fetch_array($res)) {
			$labels[] = $row['Servicio'];
			$sql = "SELECT * FROM grafica WHERE Atendio='$user' && Servicio='$row[Servicio]' && DATE(grafica.Entrega)='$dia'";
			$resul = mysql_query($sql);
			$datos[] = mysql_num_rows($resul);
			}
			$graph->title->Set( "Grafica de servicios diario de " .$dia." del usuario ".$user);
		}
		
		if (!empty($_GET['s'])) {
			$semana = $_GET['s'];					
			while ($row = mysql_fetch_array($res)) {
				$labels[] = $row['Servicio'];
				$sql = "SELECT * FROM grafica WHERE Atendio='$user' && Servicio='$row[Servicio]' && WEEK(grafica.Entrega)='$semana' && YEAR(grafica.Entrega)='$_GET[anisem]'";
				$resul = mysql_query($sql);
				$datos[] = mysql_num_rows($resul);
				$graph->title->Set( "Grafica de servicios semanal de la " .$semana." semana del usuario ".$user);
			}
		}
		
		if (!empty($_GET['m'])) {
			$mes = $_GET['m'];		
			while ($row = mysql_fetch_array($res)) {
			$labels[] = $row['Servicio'];
			$sql = "SELECT * FROM grafica WHERE Atendio='$user' && Servicio='$row[Servicio]' && MONTH(grafica.Entrega)='$mes' && YEAR(grafica.entrega)='$_GET[anim]'";
			$resul = mysql_query($sql);
			$datos[] = mysql_num_rows($resul);
			}
			
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
				default:
					$mes = "Diciembre";
					break;
			}
					
			$graph->title->Set( "Grafica de servicios mensual de " .$mes." del usuario ".$user);	
		}
		if (!empty($_GET['t'])){
			$trimestre = $_GET['t'];				
			while ($row = mysql_fetch_array($res))
			{
				$labels[] = $row['Servicio'];
				$sql = "SELECT * FROM grafica WHERE Atendio='$user' && Servicio='$row[Servicio]' && QUARTER(grafica.Entrega)='$trimestre' && YEAR(grafica.Entrega)='$_GET[anit]'";
				$resul = mysql_query($sql);		
				$datos[] = mysql_num_rows($resul);							
			}
			$graph->title->Set( "Grafica de servicios trimestarl del " .$trimestre." trimestre del usuario ".$user);		
		}
		if (!empty($_GET['a'])) {
			$anio = $_GET['a'];			
			while ($row = mysql_fetch_array($res)) {
				$labels[] = $row['Servicio'];
				$sql = "SELECT * FROM grafica WHERE Atendio='$user' && Servicio='$row[Servicio]' && YEAR(grafica.Entrega)='$anio'";
				$resul = mysql_query($sql);
				$datos[] = mysql_num_rows($resul);
			}
			$graph->title->Set( "Grafica de servicios anual de " .$anio." del usuario ".$user);
		}
		if (!empty($_GET['seis'])) {
			$semestre = $_GET['seis'];
			while ($row = mysql_fetch_array($res)) {
				$labels[] = $row['Servicio'];
				if ($semestre == 1) {
					$sql = "SELECT * FROM grafica WHERE Atendio='$user' && Servicio='$row[Servicio]' && MONTH(grafica.Entrega)<='6' && YEAR(grafica.Entrega)='$_GET[anis]'";
					$resul = mysql_query($sql);
				}
				else {
					$sql = "SELECT * FROM grafica WHERE Atendio='$user' && Servicio='$row[Servicio]' && MONTH(grafica.Entrega)>='7' && YEAR(grafica.Entrega)='$_GET[anis]'";
					$resul = mysql_query($sql);
				}
				$datos[] = mysql_num_rows($resul);
			}
			$graph->title->Set("Grafica de servicios semestral del ".$semestre." semestre del usuario ".$user);
		}
	}
		
	if(!empty($graph)){
		//Etiquetas de la grafica	
		$graph -> xaxis -> title -> set("Servicio");
		$graph->xaxis->SetTickLabels($labels);
		$graph -> yaxis -> title -> set("Realizados");
	
		//Insertamos los datos al arreglo de datos que iran en el grafico
		$bplot = new BarPlot($datos);
	
		//formatos especificos
		$bplot->SetFillGradient('#BE81F7','#E3CEF6',GRAD_HOR);
		//Ancho en pixeles
		$bplot->SetWidth(30);
	
		//al grafico le agregamos los datos
		$graph->Add($bplot);
	
		//salida por pantalla		
		$graph -> Stroke();		
	}	
	
	$objeto -> desconectar_base_datos();	
?>