<?php
require ('ClaseBaseDatos.php');

$servidor = "br-cdbr-azure-south-a.cloudapp.net";
$usuario = "b2d4b43ff244b5";
$pass = "342803d4";
$base_datos = "soportessp";
$objeto = new Servidor_Base_Datos($servidor,$usuario,$pass,$base_datos);
//acentos en la base de datos
mysql_query("SET NAMES 'utf8'");
?>