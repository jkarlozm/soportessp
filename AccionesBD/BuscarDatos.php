<?php
    session_start();
	if (!isset($_SESSION['User'])) {
		header("Location:../index.html");
	}
	
	require_once '../Conexion/conexion.php';
	
	if(empty($_GET['us']) && empty($_GET['fo'])){
		echo "Hay campos vacios";		
	}
	else {
		if (!empty($_GET['us']) && !empty($_GET['fo'])) {
			echo "Utilice un solo campo";			
		}
		else {
			if (!empty($_GET['us']) && empty($_GET['fo'])) {
				$u = $_GET['us'];
				$recupera = "SELECT * FROM registros WHERE Usuario like '%".$u."%'";
				$objeto -> consulta($recupera);						
			}
			elseif (!empty($_GET['fo']) && empty($_GET['us'])) {
				$f = $_GET['fo'];
				$recupera = "SELECT * FROM registros WHERE Id = '$f'";
				$objeto -> consulta($recupera);			
			}
		
			$numren = $objeto -> contarRenglones();
			
			if ($numren == 0) {
				echo "No hay datos";
			}
			else {
				echo "<table class='table table-condensed largotabla'>
				<tr>
					<td>Folio</td>
					<td>Atendio</td>
					<td>Recepcion</td>
					<td>Entrega</td>
					<td>Servicio</td>
					<td>Problema</td>
					<td>Usuario</td>
					<td>Mostrar</td>
					<td>Modificar</td>
				</tr>";
				while ($fila = $objeto->extraer_registros()) {
					echo "
					<tr>
					<td>$fila[0]</td>
					<td>$fila[13]</td>
					<td>$fila[1]</td>
					<td>$fila[3]</td>
					<td>$fila[8]</td>
					<td>$fila[9]</td>
					<td>$fila[14]</td>
					<td><input type='button' value='Mostrar' class='btn btn-info' id='$fila[0]' onclick='CargarForm(this.id)'></td>
					<td><input type='button' value='Modificar' data-toggle='modal' data-target='#miventana' class='btn btn-primary' id='$fila[0]' onclick='mostrarInfo(this.id)'></td>
					</tr>";
				}
				echo "</table>";
			}			
		}
	}
		
	$objeto -> desconectar_base_datos();
?>