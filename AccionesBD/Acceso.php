<?php
    require_once '../Conexion/conexion.php';
	session_start();	
	
	if (!empty($_GET['us']) && !empty($_GET['pa'])) {
		$con = "SELECT * FROM registro WHERE Nickname = '$_GET[us]' && Contrasena = '$_GET[pa]' && Tipocuenta = 'Estandar'";	
		//valida consulta
		if ($objeto -> consulta($con)) {
			$row = $objeto -> extraer_registros();
			if ($row[1] == "$_GET[us]") {
				echo "bien";
				$_SESSION ['User'] = $row['Usuario'];
			} else {
				$admcon = "SELECT * FROM registro WHERE Nickname = '$_GET[us]' && Contrasena = '$_GET[pa]' && Tipocuenta = 'Administrador'";
				if ($objeto -> consulta($admcon)) {
					$row = $objeto -> extraer_registros();
					if ($row[1] == "$_GET[us]") {
						echo "bien2";
						$_SESSION['User'] = $row['Usuario'];
					}
					else {
						echo "Verifique su Usuario o Contraseña";
					}
				}
				else {
					echo "Error en la CONSULTA 2";
				}				
			}				
		}
		else {
			echo "Error en la CONSULTA";
		}
	}
	else {
		echo "Los campos estan vacios";
	}
	
?>