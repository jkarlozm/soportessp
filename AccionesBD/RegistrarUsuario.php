<?php   
	require '../Conexion/conexion.php';
	
	if (empty($_POST['n']) && empty($_POST['nn']) && empty($_POST['p']) && empty($_POST['rp']) && empty($_POST['tc'])) {
		echo "El Formulario Esta en Blanco";
	}
	else {
		if (empty($_POST['n']) || empty($_POST['nn']) || empty($_POST['p']) || empty($_POST['rp']) || empty($_POST['tc'])) {
			echo "Todos los CAMPOS son necesarios para el REGISTRO";
		}
		else {
			if ($_POST['p'] == $_POST['rp']) {
				$comando = "SELECT * FROM registro WHERE Nickname = '$_POST[nn]'";
				if ($objeto -> consulta($comando)) {
					if ($objeto -> contarRenglones() == 0) {
						$conName = "SELECT * FROM registro WHERE Usuario = '$_POST[n]'";
						if ($objeto -> consulta($conName)) {
							if ($objeto -> contarRenglones() == 0) {
								$guardar = "INSERT INTO registro (Nickname, Usuario, Contrasena, Tipocuenta) VALUES ('$_POST[nn]', '$_POST[n]', '$_POST[p]', '$_POST[tc]')";
								$objeto -> consulta($guardar);
								if ($objeto -> registros_afectados()) {
									echo "Los Datos se han registrado de Manera Adecuada";
								}
								else {
									echo "$guardar";
								}
							}
							else {
								echo "El Nombre $_POST[n] Ya Esta Registrado";
							}
						}
						else {
							echo "La Consulta Tiene Un ERROR";
						}						
					}
					else {
						echo "El Nickname $_POST[nn] Ya Se Encuentra Registrado";
					}					
				}
				else {
					echo "La Consulta tiene un ERROR";
				}
			}
			else {
				echo "Las Contraseñas NO Coinciden";
			}
		}
	}
$objeto -> desconectar_base_datos();
?>