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
     
    $srpt ="INSERT INTO asistencia_log (codigo_membresia, fecha_registro)
VALUES ('".$membresia."', sysdate())";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
    echo $membresia;

  }


public function consultar_topconsumos_mactual()
    {
     echo 'funcion';
    /*
    $srpt ="SELECT 
            Round(sum([CTA_PRINCIPALDELTA_SIVA]), 2, 0) SIVA,
              case 
               when tipocdr=1 then 'VOZ' 
               when tipocdr=2 then 'SMS'
               when tipocdr=23 then 'Navegacion' 
               when tipocdr=14 then 'VAS' 
              END CATEGORIA
             FROM [SEG_PREPAGO].[dbo].[CONSUMOS_ODS_DIA_SMRY] where 
             [IDPERIODO]=left(convert(varchar,getdate()-1,112),6)  
            group by tipocdr order by  Round(sum([CTA_PRINCIPALDELTA_SIVA]), 2, 0)  desc ";
   
    $qsrp = sqlsrv_query($this->conectar(),$srpt, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
    //echo $srpt;
    $er = sqlsrv_num_rows($qsrp);
    if(sqlsrv_num_rows($qsrp)==0){
    echo 'Sin resultados';
    }
    else{
      while ($rowrp = sqlsrv_fetch_array($qsrp, SQLSRV_FETCH_ASSOC)) {
              //print_r($rowrp); 
              $this->consumostop[] = $rowrp;
      }

         return $this->consumostop;
    } */
  }



public function consultar_consumos_dia_mactual(){
         
    $srpt ="SELECT 
            Round(sum([CTA_PRINCIPALDELTA_SIVA]), 2, 0) SIVA,
              case 
               when tipocdr=1 then 'VOZ' 
               when tipocdr=2 then 'SMS'
               when tipocdr=23 then 'Navegacion' 
               when tipocdr=14 then 'VAS' 
               when tipocdr=6 then 'Aprop.'
              END CATEGORIA
             FROM [SEG_PREPAGO].[dbo].[CONSUMOS_ODS_DIA_SMRY] where 
             [IDPERIODO]=left(convert(varchar,getdate()-1,112),6)  
            group by tipocdr order by tipocdr desc ";
   
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

  public function consultar_consumos_dia_manterior(){
      
    $srpt ="SELECT 
             Round(sum([CTA_PRINCIPALDELTA_SIVA]), 2, 0) SIVA,
              case 
               when tipocdr=1 then 'VOZ' 
               when tipocdr=2 then 'SMS'
               when tipocdr=23 then 'Navegacion' 
               when tipocdr=14 then 'VAS' 
              END CATEGORIA
             FROM [SEG_PREPAGO].[dbo].[CONSUMOS_ODS_DIA_SMRY] where 
             [IDPERIODO]=convert(char(6), dateadd(MM, -1, getdate()-1), 112)   and dia between '01' and  (RIGHT(convert(varchar,getdate()-1,112),2)) 
            group by tipocdr order by tipocdr desc";
   
    $qsrp = sqlsrv_query($this->conectar(),$srpt, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
    //echo $srpt;
    $er = sqlsrv_num_rows($qsrp);
    if(sqlsrv_num_rows($qsrp)==0){
    echo 'Sin resultados';
    }
    else{
      while ($rowrp = sqlsrv_fetch_array($qsrp, SQLSRV_FETCH_ASSOC)) {
              //print_r($rowrp); 
              $this->consumos_manterior[] = $rowrp;
      }

         return $this->consumos_manterior;
    }
  }



  public function consultar_consumos_lastm(){
    $srpt =" SELECT 
             [IDPERIODO],Round(sum([CTA_PRINCIPALDELTA_SIVA]), 2, 0) SIVA
             FROM [SEG_PREPAGO].[dbo].[CONSUMOS_ODS_DIA_SMRY] where 
             [IDPERIODO] in (convert(char(6), dateadd(MM, -5, getdate()-1), 112),convert(char(6), dateadd(MM, -4, getdate()-1), 112),convert(char(6), dateadd(MM, -3, getdate()-1), 112),convert(char(6), dateadd(MM, -2, getdate()-1), 112),convert(char(6), dateadd(MM, -1, getdate()-1), 112) ,left(convert(varchar,getdate()-1,112),6) ) 
              and dia between '01' and  (RIGHT(convert(varchar,getdate()-1,112),2)) 
            
           group by [IDPERIODO]  order by [IDPERIODO] asc";
   
    $qsrp = sqlsrv_query($this->conectar(),$srpt, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
    //echo $srpt;
    $er = sqlsrv_num_rows($qsrp);
    if(sqlsrv_num_rows($qsrp)==0){
    echo 'Sin resultados';
    }
    else{
      while ($rowrp = sqlsrv_fetch_array($qsrp, SQLSRV_FETCH_ASSOC)) {
              //print_r($rowrp); 
              $this->consumos_lastm[] = $rowrp;
      }

         return $this->consumos_lastm;
    }
  }

  public function consumos_cdr_lastm($cdr){ 
      
    $srpt =" 

SELECT    [IDPERIODO],case 
               when tipocdr=1 then 'VOZ' 
               when tipocdr=2 then 'SMS'
               when tipocdr=23 then 'Navegacion' 
               when tipocdr=14 then 'VAS' 
              END CATEGORIA,
           Round(sum([CTA_PRINCIPALDELTA_SIVA]), 2, 0) SIVA
        FROM [SEG_PREPAGO].[dbo].[CONSUMOS_ODS_DIA_SMRY]
        where [IDPERIODO] in (convert(char(6), dateadd(MM, -4, getdate()-1), 112),convert(char(6), dateadd(MM, -3, getdate()-1), 112),convert(char(6), dateadd(MM, -2, getdate()-1), 112),convert(char(6), dateadd(MM, -1, getdate()-1), 112) ,left(convert(varchar,getdate()-1,112),6) ) 
        and tipocdr=".$cdr." and dia between '01' and  (RIGHT(convert(varchar,getdate()-1,112),2)) 
        group by [IDPERIODO],tipocdr  order by [IDPERIODO], tipocdr asc";
   
    $qsrp = sqlsrv_query($this->conectar(),$srpt, array(), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
    //echo $srpt;
    $er = sqlsrv_num_rows($qsrp);
    if(sqlsrv_num_rows($qsrp)==0){
    echo 'Sin resultados cdr last';
    }
    else{
      while ($rowrp = sqlsrv_fetch_array($qsrp, SQLSRV_FETCH_ASSOC)) {
              //print_r($rowrp); 
              $consumoscdr_lastm[] = $rowrp;
      }

         return $consumoscdr_lastm;
    }
  }

  



} //FIN DE LA CLASE


?>