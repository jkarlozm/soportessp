<?php
    require ('../Conexion/conexion.php');	
						
		
	$recupera = "SELECT * FROM registro WHERE Idusuario = '$_POST[iduser]'";
	$objeto -> consulta($recupera);	
						
	while ($fila = $objeto->extraer_registros()) {
		$datos = array('id'=>$fila[0], 'nombre'=>$fila[2], 'nickname'=>$fila[1], 'tipocuenta'=>$fila[4]);					
	}	
		
	echo json_encode($datos);
	$objeto -> desconectar_base_datos();
?>