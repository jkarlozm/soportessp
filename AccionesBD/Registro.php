<?php

session_start();

require ('../Conexion/conexion.php');

//formulario
$fecha1 = $_POST['fr'];
$estado = $_POST['est'];
$fecha2 = $_POST['fe'];

//usuario
$usuario = $_POST['us'];
$departamento = $_POST['dep'];
$direccion = $_POST['dir'];

//equipo
$equipo = $_POST['eq'];
$marca = $_POST['mar'];
$serie = $_POST['ser'];
$modelo = $_POST['mod'];
$servicio = $_POST['serv'];

//tdiagnostico
$problema = $_POST['pro'];
$diagnostico = $_POST['dia'];
$solucion = $_POST['sol'];
$observaciones = $_POST['obs'];
$atendio = $_POST['at'];

if (empty($_POST['fr']) || empty($_POST['est']) || empty($_POST['fe']) || empty($_POST['us']) || empty($_POST['pro']) || empty($_POST['sol'])) {
	$mensaje = "Hay campos vacios";	
			
} else {
	//Tabla Datos formulario
	$comando = "INSERT INTO datosformulario (Recepcion, Estado, Entrega) VALUES ('$fecha1', '$estado', '$fecha2')";
	$objeto -> consulta($comando);
	
	//Tabla Datos Usuario
	$comando = "INSERT INTO usuario (Usuario, Departamento, Direccion) VALUES ('$usuario', '$departamento', '$direccion')";
	$objeto -> consulta($comando);
	
	//Tabla Equipo
	$comando = "INSERT INTO equipo (Equipo, Marca, Serie, Modelo, Servicio) VALUES ('$equipo', '$marca', '$serie', '$modelo', '$servicio')";
	$objeto -> consulta($comando);
	
	//Tabla TDiagnostico
	$comando = "INSERT INTO tdiagnostico (Problema, Diagnostico, Solucion, Observaciones, Atendio) VALUES ('$problema', '$diagnostico', '$solucion', '$observaciones', '$atendio')";
	$objeto -> consulta($comando);
	
	if ($objeto -> registros_afectados()) {
		$mensaje = "Se han registrados los datos de manera adecuada";
		$f = mysql_insert_id($objeto->cnx);
		$_SESSION['Idfolio'] =	$f;
		$datos = array('respuesta' => $mensaje, 'folio' => $f );								
	}
	else {
		$mensaje = "Error en el registro de datos";
	}	
	
}

$datos['respuesta'] = $mensaje;
echo json_encode($datos);

$objeto -> desconectar_base_datos();

?>