<?php

//require_once "config.php";
//include("clases/class_login.php");

class BaseDatos
{


   protected $conexion;
    protected $db;

    private $datos = array();
    private $datose = array();
    private $datosg = array();
    private $datosexp = array();

    private $registros = array(); 

    private $report = array(); 
    private $reporll = array();
    private $reporz = array(); 
    private $reporf = array();

    private $archs = array(); 
    private $archw = array(); 
    private $archrl = array();
    private $archrf = array();
    private $archrgt = array();
    private $archrnc = array();
    private $todoq1 = array();
              
			  
	private $ArrayEstadoServicio= array();
	private $ArrayExpectativaMercado= array();
    private $resaj = array();//devuelve los tipos de ajustes

    public static function conectar() 
    {
     
      global $conn;
      $connectionInfo = array("UID" => "root", "PWD" => "admin123", "Database" => "gym");
      $serverName = "localhost";


$servername = "localhost";
$database = "la_arena";
$username = "admin";
$password = "admin123";


      $conn = mysqli_connect($servername, $username, $password, $database);
      if( $conn ) {
    echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     //die( print_r( sqlsrv_errors(), true));
     die("Connection failed: " . mysqli_connect_error());
}
      return $conn;      

    }

/*luis */
public function ingresar_asistencia()
    {      
      $membresia=$_POST['codigo-membresia']; 
     
    $srpt ="INSERT INTO asistencia_log (codigo_membresia, fecha_registro)
VALUES ('".$membresia."', sysdate())";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
    echo $membresia;

  }

public function ingresar_renovacion()
    {      
      $membresia=$_POST['codigo-membresia'];
      $nivel=$_POST['cmb_nivel'];
      $unidad=$_POST['cmb_unidad'];
      $vigencia=$_POST['number'];

     
    $srpt ="INSERT INTO renovacion_log (duracion,tipo,codigo_membresia,nivel,fecha_renovacion)
VALUES ('".$vigencia."','".$unidad."','".$membresia."','".$nivel."', sysdate())";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
    echo $membresia;

  }


public function consultar_renovaciones()
{         
    $srpt ="SELECT * FROM renovacion_log";
   
    $qsrp = sqlsrv_query($this->conectar(),$srpt, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
    //echo $srpt;
    $er = sqlsrv_num_rows($qsrp);
    if(sqlsrv_num_rows($qsrp)==0){
    echo 'Sin resultados';
    }
    else{
      while ($rowrp = sqlsrv_fetch_array($qsrp, SQLSRV_FETCH_ASSOC)) {
              //print_r($rowrp); 
              $this->consumos[] = $rowrp;
      }

         return $this->consumos;
    }
  }




public function ingresar_clientes()
    {
      
      $nombre=$_POST['nombre'];
      $apellido=$_POST['apellido'];
      $telefono=$_POST['telefono'];
     
    $srpt ="INSERT INTO persona (nombre, apellido, telefono)
VALUES ('".$nombre."', '".$apellido."', '".$telefono."')";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
   // echo $srpt;
    

         
  

  }

  
  



} //FIN DE LA CLASE


?>