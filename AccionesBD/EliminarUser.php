<?php
    require '../Conexion/conexion.php';
	
	$eliminar = "DELETE FROM registro WHERE Idusuario = '$_GET[s]'";
	if($objeto -> consulta($eliminar)){
		echo "Registro Eliminado";
	}
	else {
		echo "Error en la Consulta";
		echo $eliminar;		
	}
?>