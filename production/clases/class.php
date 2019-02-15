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

/*
$servername = "localhost";
$database = "la_arena";
$username = "admin";
$password = "arena2019";*/



      $conn = mysqli_connect($servername, $username, $password, $database);
      if( $conn ) {
   // echo "Conexión establecida.<br />";
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
      $srpt2 ="SELECT * FROM membresia where codigo='".$membresia."'";  
   //  $srpt2 ="SELECT * FROM membresia where codigo_membresia='1001'";  
                            $qsrp2 = mysqli_query($this->conectar(),$srpt2);
                           // echo $srpt2;
                            if(mysqli_num_rows($qsrp2)==0)
                            {
                            echo 'Codigo de membresia invalido ';
                            }
                            else
                            {
                              //echo 'Rows : '.mysqli_num_rows($qsrp2);
                              $srpt ="INSERT INTO asistencia_log (codigo_membresia, fecha_registro)
                              VALUES ('".$membresia."', sysdate())";   
                                  $qsrp = mysqli_query($this->conectar(),$srpt);
                            }  


    /*echo "<script>
         $(window).load(function(){
             $('#thankyouModal').modal('show');
         });
    </script>";*/


    //echo $qsrp;
  }

public function ingresar_renovacion()
    {      
      $membresia=$_POST['codigo-membresia'];
      $nivel=$_POST['cmb_nivel'];
      $unidad=$_POST['cmb_unidad'];
      $vigencia=$_POST['number'];


           

$srpt ="INSERT INTO renovacion_log (duracion,tipo,codigo_membresia,nivel,fecha_renovacion)
                              VALUES ('".$vigencia."','".$unidad."','".$membresia."','".$nivel."', sysdate())";
                                  echo "Cntidad de registros".mysqli_num_rows($qsrp2);
                                  $qsrp = mysqli_query($this->conectar(),$srpt);
                                 // echo $membresia;
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

  public function consultar_asistencias()
{         
    $srpt ="SELECT * FROM asistencia_log";
   
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

public function actualizar_clientes()
    {
      $codigo=$_POST['id'];
      $nombre=$_POST['nombre'];
      $apellido=$_POST['apellido'];
      $telefono=$_POST['telefono'];
      $email=$_POST['email'];
      $genero=$_POST['gender'];
      $fecha_nacimiento=$_POST['fecha'];

      $sql = "UPDATE `persona` SET `nombre`=\"".$nombre."\",`apellido`=\"".$apellido."\",`telefono`=".$telefono.",`email`=\"".$email."\",`fecha_nac`=".$fecha_nacimiento.",`genero`=\"Hombre\" WHERE codigo_membresia=\"".$codigo."\"";

      $qsrp = mysqli_query($this->conectar(),$sql);




    }

    public function eliminar_clientes()
    {
      $codigo=$_GET['id'];;

      $sql = "delete persona where codigo_membresia='".$codigo."'";

      $qsrp = mysqli_query($this->conectar(),$sql);




    }





 /* fin luis */
//edu
public function ingresar_clientes()
    {
      
      
 


      $nombre=$_POST['nombre'];
      $apellido=$_POST['apellido'];
      $telefono=$_POST['telefono'];
      $email=$_POST['email'];
      $genero=$_POST['genero'];
      $fecha_nacimiento=$_POST['fecha_nacimiento'];

      $nivel=$_POST['nivel'];
      $medio_conocio=$_POST['medio_conocio'];
      $time = strtotime($f_inicio=$_POST['f_inicio']);
      $f_inicio = date('Y-m-d',$time);

 

      $lastm ="select max(idmembresia) correlativom from membresia";
      $respuesta1=mysqli_query($this->conectar(),$lastm); 
      $rowrp = mysqli_fetch_array($respuesta1, MYSQLI_ASSOC);
      $lastm=$rowrp['correlativom'];



     $codigo_membresia=strtoupper(substr($apellido,0,1)).strtoupper(substr($nombre,0,1)).date("Y").$lastm;

    $srpt ="INSERT INTO persona (nombre, apellido, telefono, email,fecha_nac,genero,codigo_membresia)
VALUES ('".$nombre."', '".$apellido."', '".$telefono."', '".$email."', '".$fecha_nacimiento."', 
'".$genero."', 
'".$codigo_membresia."')";
   
   
   $respuesta1=mysqli_query($this->conectar(),$srpt);
    //echo $srpt;
    //insert  para datos de membresia

      $srpt2 ="INSERT INTO membresia (codigo_membresia, nivel, medio_conocio, fecha_inicio)
VALUES ('".$codigo_membresia."','".$nivel."', '".$medio_conocio."',   '".$f_inicio."')";
   
     $respuesta2=mysqli_query($this->conectar(),$srpt2);
    // echo $srpt2;

        $uerror=0;
       if($respuesta1==false or $respuesta2==false){

         $uerror=1;
       }  
  
   return $uerror;
  }


public function ingresar_suscripcion()
    {
      
      $codigo_membresia=$_POST['codigo_membresia'];
      $membresia=$_POST['membresia'];
      $promocion=$_POST['promocion'];
      $cuota=$_POST['cuota'];
      $cantidad=$_POST['cantidad'];
      $f_inicio=$_POST['f_inicio'];
      $f_fin=$_POST['f_fin'];
      $comentario=$_POST['comentario'];
      $tipo_pago=$_POST['tipo_pago'];

      $time = strtotime($f_inicio);
      $f_inicio = date('Y-m-d',$time);

      $time = strtotime($f_fin);
      $f_fin = date('Y-m-d',$time);

  $usuario='eduardo.herrera';

     

    $srpt ="INSERT INTO suscripcion (codigo_membresia, promocion, cuota, cantidad,tipo_pago,tipo_membresia,fecha_inicio,fecha_fin, comentario,estado)
VALUES ('".$codigo_membresia."', '".$promocion."', '".$cuota."', '".$cantidad."', '".$tipo_pago."', '".$membresia."', '".$f_inicio."', '".$f_fin."', '".$comentario."','1')
";
   
    
   
   $result=mysqli_query($this->conectar(),$srpt);
   

      $lastid ="select max(id_suscripcion) correlativom from suscripcion";
      $respuesta1=mysqli_query($this->conectar(),$lastid); 
      $rowrp = mysqli_fetch_array($respuesta1, MYSQLI_ASSOC);
      $lastm=$rowrp['correlativom'];
    

//registrar el pago realizado
    $srpt2 ="INSERT INTO pago (id_suscripcion, monto, usuario_registro)
VALUES ('".$lastm."', '".$cuota."', '".$usuario."')";

 $result2=mysqli_query($this->conectar(),$srpt2);
   


$uerror=0;
if($result==false or $result2==false)
{

  $uerror=1;

   //if(($errors=mysql_error())!=null){}
}

   // echo $srpt;
 return $uerror;
         
  

  }


public function ingresar_promocion()
    {
      
      $nombre=$_POST['name'];
      $membresia=$_POST['membresia'];
      $cantidad=$_POST['cantidad'];
      $precio=$_POST['precio'];
      
      $f_inicio=$_POST['f_inicio'];
      $f_fin=$_POST['f_fin'];
      $comentario=$_POST['comentario'];
       
      $time = strtotime($f_inicio);
      $f_inicio = date('Y-m-d',$time);

      $time = strtotime($f_fin);
      $f_fin = date('Y-m-d',$time);

  $usuario='eduardo.herrera';

     

    $srpt ="INSERT INTO catalogo_promocion (nombre, tipo, cantidad, precio,f_inicio,f_fin, comentario,estado)
VALUES ('".$nombre."', '".$membresia."', '".$cantidad."', '".$precio."',  '".$f_inicio."', '".$f_fin."', '".$comentario."','1')
";
   
   // echo $srpt;
   
   $result=mysqli_query($this->conectar(),$srpt);
   
 
   


$uerror=0;
if($result==false )
{

  $uerror=1;

   //if(($errors=mysql_error())!=null){}
}

   // echo $srpt;
 return $uerror;
         
  

  }



  



} //FIN DE LA CLASE


?>