<?php
    session_start();
	
	require('../Conexion/conexion.php');
	
	//formulario
	$folio = $_POST['f'];
	$fecha1 = $_POST['fe1'];
	$estado = $_POST['est'];
	$fecha2 = $_POST['fe2'];
	
	//usuario
	$usuario = $_POST['us'];
	$departamento = $_POST['dep'];
	$direccion = $_POST['dir'];
	
	//equipo
	$equipo = $_POST['equ'];
	$marca = $_POST['ma'];
	$serie = $_POST['se'];
	$modelo = $_POST['mo'];
	$servicio = $_POST['src'];
	
	//tdiagnostico
	$problema = $_POST['pro'];
	$diagnostico = $_POST['dia'];
	$solucion = $_POST['sol'];
	$observaciones = $_POST['obs'];
	$atendio = $_POST['a'];
	
	if (empty($_POST['fe1']) || empty($_POST['est']) || empty($_POST['fe2']) || empty($_POST['us']) || empty($_POST['pro']) || empty($_POST['sol'])) {
		?>
		<script type="text/javascript">	
			alert("Hay campos VACIOS que son REQUERIDOS");
		</script>
		<?php			
	} else {
		//Tabla Datos formulario
		$comando = "UPDATE datosformulario SET Recepcion = '$fecha1', Estado = '$estado', Entrega = '$fecha2' WHERE Id = '$folio'";
		$objeto -> consulta($comando);
		
		//Tabla Datos Usuario
		$comando = "UPDATE usuario SET Usuario = '$usuario', Departamento = '$departamento', Direccion = '$direccion' WHERE Id = '$folio'";
		$objeto -> consulta($comando);
		
		//Tabla Equipo
		$comando = "UPDATE equipo SET Equipo = '$equipo', Marca = '$marca', Serie = '$serie', Modelo = '$modelo', Servicio = '$servicio' WHERE Id = '$folio'";
		$objeto -> consulta($comando);
		
		//Tabla TDiagnostico
		$comando = "UPDATE tdiagnostico SET Problema = '$problema', Diagnostico = '$diagnostico', Solucion = '$solucion', Observaciones = '$observaciones', Atendio = '$atendio' WHERE Id = '$folio'";
		$objeto -> consulta($comando);
		
		if ($objeto -> consulta($comando)) {
			?>
			<script type="text/javascript">
				alert("Se han actualizado los datos de manera adecuada");
			</script>
			<?php											
		}
		else {
			?>
			<script type="text/javascript">	
				alert("Error en la actualizacion de datos");
			</script>
			<?php
		}
	}
	$objeto -> desconectar_base_datos();
?>