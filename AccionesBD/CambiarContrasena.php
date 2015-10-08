<?php
    require '../Conexion/conexion.php';
	
	if(empty($_POST['ap1']) && empty($_POST['arp'])){
		echo "Los Campos Estan Vacios";
	}
	else {
		if (empty($_POST['ap1']) || empty($_POST['arp'])) {
			echo "Es Necesario Llenar Ambos Campos";
		}
		else {
			if ($_POST['ap1'] == $_POST['arp']) {
				$consulta = "UPDATE registro SET Contrasena = '$_POST[arp]' WHERE Idusuario = '$_POST[ai1]' ";
				if ($objeto -> consulta($consulta)) {
					echo "Se Actualizo la contraseña";
				}
				else {
					echo "No Se Pudo Actualizar La Contraseña";
				}
			}
			else {
				echo "las Contrasenas no Coinciden";
			}
		}
	}
?>