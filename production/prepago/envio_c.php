<?php

include("../header.php");


//echo 'mensaje';
//print_r($_POST);

$listado=explode(",",$_POST['list_correos'] );


//print_r($listado);

 







use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';


//Load Composer's autoloader
//require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'jeduardoh.c@gmail.com';                 // SMTP username
    $mail->Password = 'jesucristo123456789';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('jeduardoh.c@gmail.com', 'La Arena');

    

    foreach ($listado as $valor) {
    //$valor = $valor * 2;
    $mail->addAddress($valor, 'Remitente'); 
}


    //$mail->addAddress('jeduardoh.c@gmail.com', 'Remitente');     // Add a recipient
    //$mail->addAddress('luis9003@gmail.com', 'Remitente');     // Add a recipient
     

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['asunto'];
    $mail->Body    = $_POST['editor1'];
   // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    


echo '

<br>
<br>
    <div class="right_col" role="main">
          <div class="">
          
           <div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Envio Correcto!</strong> Los Mensajes han sido enviados con exito.
                  </div>  
           <a class="btn btn-app">
                      <span class="badge bg-orange">!!!</span>
                      <i class="fa fa-envelope"></i> Mail Enviados
                    </a>

        
          </div>
        </div> ';
 

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}



 
?>



        <?php
include("../footer.php");

 
?>