<?php    
    /**
     *Conexion 
     */
    class Conexion {
    	
		//Variables para la conexion
		private $servidor;
		private $user;
		private $password;
		private $conexion;
		        
        //Datos de la conexion
        public function __construct() {
            $this -> servidor = 'localhost';
			$this -> user = 'root';
			$this -> password = '';
        }
		
		//Abrir conexion BD
		public function abrirConexion()
		{
			$this -> conexion = mysql_connect($this -> servidor, $this -> user, $this -> password) or die ('Fallo la conexion a la base de datos');
		}
		
		//Cerrer Conexion BD
		public function cerrarConexion()
		{
			mysql_close($this -> conexion);
		}
		
		public function getConexion()
		{
			return $this -> conexion;
		}
		
		//Seleccion de la BD
		public function seleccionarBaseDatos($bd)
		{
			mysql_select_db($bd, $this->conexion);
		}
		
		//Enviar Consulta
		public function setConuslta($query)
		{
			//acentos en la base de datos
			mysql_query("SET NAMES 'utf8'");
			mysql_query($query, $this -> conexion);
			echo mysql_error();
		}
		
		public function getConsulta($query)
		{
			//acentos en la base de datos
			mysql_query("SET NAMES 'utf8'");
			return mysql_query($query, $this -> conexion);
			echo mysql_error();
		}
    }    
?>