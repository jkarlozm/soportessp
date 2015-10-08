<?php
	require 'ConexionBD.php';
		
    /**
     * 
     */
    class Consultas extends Conexion {	
    	
        function __construct() {
        	parent::__construct();    
        }
		
		public function seleccionaEstado()
		{
			$resultado = array();
			$this -> abrirConexion();
			$this -> seleccionarBaseDatos('proyecto');
			$rsql = $this -> getConsulta("SELECT * FROM testado"); 						
			
			if(mysql_num_rows($rsql)>0){				
				while ($fila = mysql_fetch_assoc($rsql)) {
					array_push($resultado, $fila);
				}
			}
						
			$this -> cerrarConexion();
			return $resultado;
		}		
		
		public function radioSer(){
			$resultado = array();
			$this -> abrirConexion();
			$this -> seleccionarBaseDatos('proyecto');
			$rsql = $this -> getConsulta("SELECT * FROM tservicio");
			if (mysql_num_rows($rsql)) {
				while ($fila = mysql_fetch_assoc($rsql)) {
					array_push($resultado, $fila);
				}
			$this -> cerrarConexion();
			return $resultado;
			}
		}
    }
    
?>