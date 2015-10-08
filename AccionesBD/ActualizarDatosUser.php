<?php
    require '../Conexion/conexion.php';
	
	if (empty($_POST['a']) && empty($_POST['b']) && empty($_POST['c'])) {
		echo "El Formulario Esta en Blanco";
	}
	else {
		if (empty($_POST['a']) || empty($_POST['b']) || empty($_POST['c'])) {
			echo "Todos los CAMPOS son necesarios para Actualizar";			
		}
		else {			
			$actualizar = "UPDATE registro SET Nickname = '$_POST[b]', Usuario = '$_POST[a]', Tipocuenta = '$_POST[c]' WHERE Idusuario = '$_POST[d]'";
			if($objeto ->consulta($actualizar)){
				echo "Datos Actualizados";
			}
			else {
				echo "No se pudieron Actualizar los DATOS";
			}			
		}
	}
?>