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

    $sql2 = "UPDATE suscripcion t1 set estado=2  where sysdate()>=fecha_fin";
  $result2=mysqli_query($this->conectar(),$sql2); 

  $sql3 = "UPDATE suscripcion t1 set estado=2  where (select max(tipo) from catalogo_promocion where id_promocion=t1.tipo_membresia)=2 and (select count(*) from asistencia_log where idsuscripcion=t1.id_suscripcion)>=t1.cantidad";
  $result3=mysqli_query($this->conectar(),$sql3); 
                        
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

      $time = strtotime($fecha_nacimiento=$_POST['fecha']);
      $fecha_nacimiento = date('Y-m-d',$time);


      $sql = "UPDATE `persona` SET `nombre`=\"".$nombre."\",`apellido`=\"".$apellido."\",`telefono`=".$telefono.",`email`=\"".$email."\",`fecha_nac`=\"".$fecha_nacimiento."\",`genero`=\"".$genero."\" WHERE codigo_membresia=\"".$codigo."\"";

      $qsrp = mysqli_query($this->conectar(),$sql);

     // echo  'Registros Actualizados Con Exito' ;




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
   
  //echo $srpt;
   
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
if($result==false )
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
      $estado=$_POST['estado'];
      
      $f_inicio=$_POST['f_inicio'];
      $f_fin=$_POST['f_fin'];
      $comentario=$_POST['comentario'];
       
      $time = strtotime($f_inicio);
      $f_inicio = date('Y-m-d',$time);

      $time = strtotime($f_fin);
      $f_fin = date('Y-m-d',$time);

  $usuario='eduardo.herrera';

     

    $srpt ="INSERT INTO catalogo_promocion (nombre, tipo, cantidad, precio,f_inicio,f_fin, comentario,estado)
VALUES ('".$nombre."', '".$membresia."', '".$cantidad."', '".$precio."',  '".$f_inicio."', '".$f_fin."', '".$comentario."','".$estado."')
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


  public function actualizar_promocion()
    {
      $id=$_POST['id'];
      $nombre=$_POST['name'];
      $membresia=$_POST['membresia'];
      $cantidad=$_POST['cantidad'];
      $precio=$_POST['precio'];
      $estado=$_POST['estado'];      
      $f_inicio=$_POST['f_inicio'];
      $f_fin=$_POST['f_fin'];
      $comentario=$_POST['comentario'];       
      $time = strtotime($f_inicio);
      $f_inicio = date('Y-m-d',$time);
      $time = strtotime($f_fin);
      $f_fin = date('Y-m-d',$time);
      $usuario='eduardo.herrera'; 

     $sql = "UPDATE `catalogo_promocion` SET `nombre`=\"".$nombre."\",`tipo`=".$membresia.",`cantidad`=".$cantidad.",`precio`=".$precio.",`comentario`=\"".$comentario."\", estado=".$estado."  WHERE id_promocion=".$id."";

   
   // echo $srpt;
   
   $result=mysqli_query($this->conectar(),$sql);  
 
  

$uerror=0;
if($result==false )
{

  $uerror=1;

   //if(($errors=mysql_error())!=null){}
} 

   // echo $srpt;
 return $uerror; 
  }

    public function consultarc_promociones()
{         
    $srpt ="SELECT * FROM catalogo_promocion";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
    //echo $srpt;
    $er = mysqli_num_rows($qsrp);
    if(mysqli_num_rows($qsrp)==0){
    echo 'Sin resultados';
    }
    else{
      while ($rowrp = mysqli_fetch_array($qsrp)) {
              //print_r($rowrp); 
              $this->resultado[] = $rowrp;
      }

         return $this->resultado;
    }
  }






public function reportep_clientest()
{         
    $srpt ="SELECT count(*) clientes FROM persona";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
    //echo $srpt;
    $er = mysqli_num_rows($qsrp);
    if(mysqli_num_rows($qsrp)==0){
    echo 'Sin resultados';
    }
    else{
      while ($rowrp = mysqli_fetch_array($qsrp)) {
              //print_r($rowrp); 
              $this->resultado[] = $rowrp;
      }

         return $this->resultado;
    }
  }

  public function reportep_suscripcionesa()
{         
    $srpt ="SELECT count(distinct codigo_membresia) suscripciones FROM suscripcion where estado=1";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
    //echo $srpt;
    $er = mysqli_num_rows($qsrp);
    if(mysqli_num_rows($qsrp)==0){
    echo 'Sin resultados';
    }
    else{
      while ($rowrp = mysqli_fetch_array($qsrp)) {
              //print_r($rowrp); 
              $this->resultados[] = $rowrp;
      }

         return $this->resultados;
    }
  }

  public function reportep_suscripcionesa_detalle()
{         
    $srpt ="select a.codigo_membresia, c.nombre nombre_p, c.apellido , a.promocion , 
case 
when tipo=1 then 'Mensual'
when tipo=2 then 'Clases'
end as tipo_membresia, b.cantidad, b.precio, a.fecha_inicio, a.fecha_fin , a.comentario , b.nombre, 
case
  when  a.estado=1 then 'Activa'
  when a.estado=2 then 'Vencida'
end estado  ,

(select count(*) cantidad  from asistencia_log where codigo_membresia=a.codigo_membresia and idsuscripcion=a.id_suscripcion)  cantidad_asistencia
from suscripcion a inner join catalogo_promocion b on a.tipo_membresia=b.id_promocion inner join persona c on a.codigo_membresia=c.codigo_membresia
where a.estado=1
";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
     
     return $qsrp;
  }

    public function reportep_ingresmes_encabezado()
{         
    $srpt ="select 
DATE_FORMAT( date_add(sysdate() , INTERVAL -3 MONTH), '%M') as mes1,
DATE_FORMAT( date_add(sysdate() , INTERVAL -2 MONTH), '%M') as mes2,
DATE_FORMAT( date_add(sysdate() , INTERVAL -1 MONTH), '%M') as mes3,
DATE_FORMAT( sysdate(), '%M') as mes4";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
     
     return $qsrp;
  }

    public function reportep_ingresmes_detalle()
{         
    $srpt ="select 
sum(if(DATE_FORMAT( date_add(sysdate(), INTERVAL -3 MONTH) , '%Y-%c')=DATE_FORMAT( fecha_pago, '%Y-%c'),monto,0)) mes1,
sum(if(DATE_FORMAT( date_add(sysdate(), INTERVAL -2 MONTH) , '%Y-%c')=DATE_FORMAT( fecha_pago, '%Y-%c'),monto,0)) mes2,
sum(if(DATE_FORMAT( date_add(sysdate(), INTERVAL -1 MONTH) , '%Y-%c')=DATE_FORMAT( fecha_pago, '%Y-%c'),monto,0)) mes3,
sum(if(DATE_FORMAT( sysdate(), '%Y-%c')=DATE_FORMAT( fecha_pago, '%Y-%c'),monto,0)) as mes4 
from pago";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
     
     return $qsrp;
  }


    public function reportep_suscripcionesv_detalle()
{         
    $srpt ="select a.codigo_membresia, c.nombre nombre_p, c.apellido , a.promocion , 
case 
when tipo=1 then 'Mensual'
when tipo=2 then 'Clases'
end as tipo_membresia, b.cantidad, b.precio, a.fecha_inicio, a.fecha_fin , a.comentario , b.nombre, 
case
  when  a.estado=1 then 'Activa'
  when a.estado=2 then 'Vencida'
end estado  ,

(select count(*) cantidad  from asistencia_log where codigo_membresia=a.codigo_membresia and idsuscripcion=a.id_suscripcion)  cantidad_asistencia
from suscripcion a inner join catalogo_promocion b on a.tipo_membresia=b.id_promocion inner join persona c on a.codigo_membresia=c.codigo_membresia
where a.estado=2
";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
     
     return $qsrp;
  }


    public function reportep_clientesasist_detalle()
{         
    $srpt ="  (select DATE_FORMAT(fecha_registro, '%Y%m') periodo ,a.codigo_membresia,b.nombre, b.apellido, case when tipo=1 then 'Mensual' when tipo=2 then 'Clases' end as tipo_membresia, (select count(*) cantidad from asistencia_log where codigo_membresia=a.codigo_membresia and idsuscripcion=a.id_suscripcion) cantidad_asistencia , fecha_inicio, fecha_fin ,case
  when  a.estado=1 then 'Activa'
  when a.estado=2 then 'Vencida'
end estado , precio from suscripcion a inner join persona b on a.codigo_membresia=b.codigo_membresia inner join catalogo_promocion c on a.tipo_membresia=c.id_promocion where a.estado=1 and (select count(*) cantidad from asistencia_log where codigo_membresia=a.codigo_membresia and idsuscripcion=a.id_suscripcion)>0)
union 
(select DATE_FORMAT(fecha_registro, '%Y%m') periodo ,a.codigo_membresia,b.nombre, b.apellido, case when tipo=1 then 'Mensual' when tipo=2 then 'Clases' end as tipo_membresia, (select count(*) cantidad from asistencia_log where codigo_membresia=a.codigo_membresia and idsuscripcion=a.id_suscripcion) cantidad_asistencia , fecha_inicio, fecha_fin ,case when a.estado=1 then 'Activa' when a.estado=2 then 'Vencida' end estado , precio from suscripcion a inner join persona b on a.codigo_membresia=b.codigo_membresia inner join catalogo_promocion c on a.tipo_membresia=c.id_promocion where a.estado=2 and (select count(distinct codigo_membresia) cantidad from asistencia_log where codigo_membresia=a.codigo_membresia and idsuscripcion=a.id_suscripcion and fecha_registro>a.fecha_fin)>0)
";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
     
     return $qsrp;
  }






  //clientes con suscripciones vencidas, las que estan en estado 2 pero no tienen niguna otra sucripcion activa

public function reportep_suscripcionesv()
{         
    $srpt ="SELECT count(distinct codigo_membresia) suscripciones  FROM suscripcion a where estado=2 
    and (select count(*) from suscripcion where codigo_membresia=a.codigo_membresia and estado=1)=0";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
    //echo $srpt;
    $er = mysqli_num_rows($qsrp);
    if(mysqli_num_rows($qsrp)==0){
    echo 'Sin resultados';
    }
    else{
      while ($rowrp = mysqli_fetch_array($qsrp)) {
              //print_r($rowrp); 
              $this->resultadosv[] = $rowrp;
      }

         return $this->resultadosv;
    }
  }

public function reportep_morac()
{         
    $srpt ="select count(distinct a.codigo_membresia) clientes from suscripcion a inner join persona b on a.codigo_membresia=b.codigo_membresia where estado=2
and (select count(distinct codigo_membresia) cantidad  from asistencia_log where codigo_membresia=a.codigo_membresia and idsuscripcion=a.id_suscripcion
 and fecha_registro>a.fecha_fin)>0";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
    //echo $srpt;
    $er = mysqli_num_rows($qsrp);
    if(mysqli_num_rows($qsrp)==0){
    echo 'Sin resultados';
    }
    else{
      while ($rowrp = mysqli_fetch_array($qsrp)) {
              //print_r($rowrp); 
              $this->resultadosm[] = $rowrp;
      }

         return $this->resultadosm;
    }
  }


//clientes con suscripcion activa que tienen registradas asistencias
  public function reportep_susactiva_asistiendo()
{         
    $srpt ="select count(*) clientes from suscripcion a inner join persona b on a.codigo_membresia=b.codigo_membresia where estado=1
and (select count(*) cantidad  from asistencia_log where codigo_membresia=a.codigo_membresia and idsuscripcion=a.id_suscripcion)>0";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
    //echo $srpt;
    $er = mysqli_num_rows($qsrp);
    if(mysqli_num_rows($qsrp)==0){
    echo 'Sin resultados';
    }
    else{
      while ($rowrp = mysqli_fetch_array($qsrp)) {
              //print_r($rowrp); 
              $this->resultados_asis[] = $rowrp;
      }

         return $this->resultados_asis;
    }
  }




public function reportep_clientes_asistiendo()
{         
    $srpt ="select count(distinct codigo_membresia) clientes from asistencia_log ";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
    //echo $srpt;
    $er = mysqli_num_rows($qsrp);
    if(mysqli_num_rows($qsrp)==0){
    echo 'Sin resultados';
    }
    else{
      while ($rowrp = mysqli_fetch_array($qsrp)) {
              //print_r($rowrp); 
              $this->resultados_a[] = $rowrp;
      }

         return $this->resultados_a;
    }
  }


public function reportep_ingresos_mac()
{         
    $srpt ="select sum(monto) monto from pago a where DATE_FORMAT(fecha_pago, '%Y%m')=date_format(date_add(NOW(), INTERVAL 0 MONTH),'%Y%m')";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
    //echo $srpt;
    $er = mysqli_num_rows($qsrp);
    if(mysqli_num_rows($qsrp)==0){
    echo 'Sin resultados';
    }
    else{
      while ($rowrp = mysqli_fetch_array($qsrp)) {
              //print_r($rowrp); 
              $this->ingresoma[] = $rowrp;
      }

         return $this->ingresoma;
    }
  }


public function reportep_ingresos_mant()
{         
    $srpt ="select sum(monto) monto from pago a where DATE_FORMAT(fecha_pago, '%Y%m')=date_format(date_add(NOW(), INTERVAL -1 MONTH),'%Y%m')";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
    //echo $srpt;
    $er = mysqli_num_rows($qsrp);
    if(mysqli_num_rows($qsrp)==0){
    echo 'Sin resultados';
    }
    else{
      while ($rowrp = mysqli_fetch_array($qsrp)) {
              //print_r($rowrp); 
              $this->ingresomant[] = $rowrp;
      }

         return $this->ingresomant;
    }
  }


public function reportep_clientesnuevos_ma()
{         
    $srpt ="select count(distinct codigo_membresia) clientes from membresia where
DATE_FORMAT(fecha_inicio, '%Y%m')=date_format(date_add(NOW(), INTERVAL 0 MONTH),'%Y%m ')";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
    //echo $srpt;
    $er = mysqli_num_rows($qsrp);
    if(mysqli_num_rows($qsrp)==0){
    echo 'Sin resultados';
    }
    else{
      while ($rowrp = mysqli_fetch_array($qsrp)) {
              //print_r($rowrp); 
              $this->clientesna[] = $rowrp;
      }

         return $this->clientesna;
    }
  }

  public function reportep_avg_asistenciad()
{         
    $srpt ="select avg(asistencia) prom_asistencia from (
select count(*) asistencia,  DATE_FORMAT(fecha_registro, '%d') dia from asistencia_log where
DATE_FORMAT(fecha_registro, '%Y%m')=date_format(date_add(NOW(), INTERVAL 0 MONTH),'%Y%m ') ) g";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
    //echo $srpt;
    $er = mysqli_num_rows($qsrp);
    if(mysqli_num_rows($qsrp)==0){
    echo 'Sin resultados';
    }
    else{
      while ($rowrp = mysqli_fetch_array($qsrp)) {
              //print_r($rowrp); 
              $this->avg_diarias[] = $rowrp;
      }

         return $this->avg_diarias;
    }
  }


 public function reportep_ingresosxmesh()
{         
    $srpt ="select DATE_FORMAT(fecha_pago, '%M') mes,sum(monto) ingresos  from pago  where 
DATE_FORMAT(fecha_pago, '%Y')=date_format(date_add(NOW(), INTERVAL 0 MONTH),'%Y')
group by DATE_FORMAT(fecha_pago, '%m') order by DATE_FORMAT(fecha_pago, '%M') ";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
    //echo $srpt;
    $er = mysqli_num_rows($qsrp);
    if(mysqli_num_rows($qsrp)==0){
    echo 'Sin resultados';
    }
    else{
      while ($rowrp = mysqli_fetch_array($qsrp)) {
              //print_r($rowrp); 
              $this->ingresoxmesh[] = $rowrp;
      }

         return $this->ingresoxmesh;
    }
  }









//SEGURIDAD
  public function validar_usuario($usuario, $pass)
{        
   $bandera=1; 
    $srpt ="select *from usuario where usuario='".$usuario."' and pass='".$pass."' ";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
    echo $srpt;
    $er = mysqli_num_rows($qsrp);
    if(mysqli_num_rows($qsrp)==0){
    echo 'Sin resultados';
    $bandera=0;
    }
    else{
      while ($rowrp = mysqli_fetch_array($qsrp)) {
              //print_r($rowrp); 
              $this->usuario[] = $rowrp;
      }

         return $bandera;
    }
  }

    public function estado($usuario, $pass)
{        
  // $bandera=1; 
    $srpt ="select *from usuario where usuario='".$usuario."' and pass='".$pass."' ";
   
    $qsrp = mysqli_query($this->conectar(),$srpt);
  echo $srpt;
    $er = mysqli_num_rows($qsrp);
    if(mysqli_num_rows($qsrp)==0){
    echo 'Sin resultados';
    //$bandera=0;
    }
    else{
      while ($rowrp = mysqli_fetch_array($qsrp)) {
              //print_r($rowrp); 
              $this->usuarios[] = $rowrp;
      }

         return $this->usuarios;
    }
  }


  public function ingresar_user()
    {
      
      $nombre=$_POST['name'];
      $user=$_POST['user'];
      $pass=$_POST['pass']; 
      $estado=$_POST['estado'];
      

  $usuario='eduardo.herrera';

     

    $srpt ="INSERT INTO usuario (nombre, usuario, pass, estado)
VALUES ('".$nombre."', '".$user."', '".$pass."', '".$estado."')";
   
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


  public function actualizar_usuario()
    {
      $id=$_POST['id'];
      $nombre=$_POST['name'];
      $usuario=$_POST['usuario'];
      $cantidad=$_POST['pass']; 
      $estado=$_POST['estado'];    
     // $usuario='eduardo.herrera'; 

     $sql = "UPDATE `usuario` SET `nombre`=\"".$nombre."\",`usuario`=\"".$usuario."\",`estado`=".$estado."  WHERE id_usuario=".$id."";

   
    //echo $sql;
   
   $result=mysqli_query($this->conectar(),$sql);  
 
  

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