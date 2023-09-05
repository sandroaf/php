<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'devistiunidavi@gmail.com';                     //SMTP username

    /**** Colocar aqui a SENHA 
    $mail->Password   = 'SENHA';   
    */
    // 
    //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption PHPMailer::ENCRYPTION_SMTPS
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    //$mail->setFrom('devistiunidavi@gmail.com', 'devistiunidavi');
    //$mail->addAddress('sandroaf@unidavi.edu.br', 'Sandro UNIDAVI');     //Add a recipient
    $mail->setFrom($_POST['email'], $_POST['nome']);
    $mail->addAddress('sandroaf@unidavi.edu.br', 'Sandro Alencar Fernandes - UNIDAVI');     //Add a recipient


    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('sandroaf@unidavi.edu.br', 'Sandro Alencar Fernandes');
    //Para quem deve responder - contato que preencheu o Form.
    $mail->addReplyTo($_POST['email'], $_POST['nome']);
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $_POST['assunto'];
    $mail->Body    = $_POST['mensagem'];
    $mail->Body    .= '<br><br>';
    $mail->Body    .= '<strong>'.$_POST['nome'].'</strong><br>';
    $mail->Body    .= $_POST['email'].' - '.$_POST['fone'].'<br>';
    $mail->AltBody = $_POST['mensagem'].'\n\n'.$_POST['nome'].'\n\n';
    $mail->AltBody .= $_POST['email'].'\n'.$_POST['fone'];
    
    $mail->send();
    echo 'Mensagem enviada com sucesso';
} catch (Exception $e) {
    echo "Mensagem não pode ser enviar. Erro e-mail: {$mail->ErrorInfo}";
}