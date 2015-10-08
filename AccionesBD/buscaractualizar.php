<?php
    session_start();
    require ('../Conexion/conexion.php');
	
	
	if(empty($_POST['f'])){
		$mensaje = "El campo FOLIO esta VACIO";						
	}
	else {					
		$f = $_POST['f'];
		$recupera = "SELECT * FROM registros WHERE Id = '$f'";
		$objeto -> consulta($recupera);
		
		$numren = $objeto -> contarRenglones();			
		if ($numren == 0) {
			$mensaje = "No hay datos";				
		}
		else {
							
			while ($fila = $objeto->extraer_registros()) {
				$datos = array('folio'=>$fila[0], 'recepcion'=>$fila[1], 'estado'=>$fila[2], 'entrega'=>$fila[3], 'equipo'=>$fila[4], 'marca'=>$fila[5],
				'serie'=>$fila[6], 'modelo'=>$fila[7], 'servicio'=>$fila[8], 'problema'=>$fila[9], 'diagnostico'=>$fila[10], 'solucion'=>$fila[11], 
				'observaciones'=>$fila[12], 'atendio'=>$fila[13], 'usuario'=>$fila[14], 'departamento'=>$fila[15], 'direccion'=>$fila[16]);					
			}
			$mensaje = "Datos cargados";
		}
			
	}
	
	$datos['resultado'] = $mensaje;	
	echo json_encode($datos);
	$objeto -> desconectar_base_datos();

?>