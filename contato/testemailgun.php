<?php
date_default_timezone_set('Etc/UTC');
ini_set('error_reporting', E_ALL); // mesmo resultado de: error_reporting(E_ALL);
ini_set('display_errors', 1);
// Using Awesome https://github.com/PHPMailer/PHPMailer

// Importar as classes 
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//use PHPMailer\PHPMailer\SMTP;

# Include the Autoloader (see "Libraries" for install instructions)
require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = Mailgun::create('f787fbf8f80ca148a6c3182335ad6f02-7ca144d2-9596493e');
$domain = "sandbox41c33954c5134d18bae098cc0c71710c.mailgun.org";
$params = array(
  'from'    => 'Excited User <sandroaf@unidavi.edu.br>',
  'to'      => 'sandroaf@unidavi.edu.br',
  'subject' => 'Hello',
  'text'    => 'Testing some Mailgun awesomness!'
);
//$result = $mgClient->domains()->index();
echo "<pre>";
//print_r($result);

# Make the call to the client.
print_r($mgClient->messages()->send($domain, $params));
echo "</pre>";

/*
//Create a new SMTP instance
$smtp = new SMTP();

//Enable connection-level debug output
$smtp->do_debug = SMTP::DEBUG_CONNECTION;
echo '<pre>';
try {
    //Connect to an SMTP server
    if (!$smtp->connect('smtp.mailgun.org', 587)) {
        throw new Exception('Connect failed');
    }
    //Say hello
    if (!$smtp->hello(gethostname())) {
        throw new Exception('EHLO failed: ' . $smtp->getError()['error']);
    }
    //Get the list of ESMTP services the server offers
    $e = $smtp->getServerExtList();
    //If server can do TLS encryption, use it
    if (is_array($e) && array_key_exists('STARTTLS', $e)) {
        $tlsok = $smtp->startTLS();
        if (!$tlsok) {
            throw new Exception('Failed to start encryption: ' . $smtp->getError()['error']);
        }
        //Repeat EHLO after STARTTLS
        if (!$smtp->hello(gethostname())) {
            throw new Exception('EHLO (2) failed: ' . $smtp->getError()['error']);
        }
        //Get new capabilities list, which will usually now include AUTH if it didn't before
        $e = $smtp->getServerExtList();
    }
    //If server supports authentication, do it (even if no encryption)
    if (is_array($e) && array_key_exists('AUTH', $e)) {
        if ($smtp->authenticate('postmaster@sandbox41c33954c5134d18bae098cc0c71710c.mailgun.org', '8472ac04147bf83a98f28c2f858c952b-7ca144d2-f4f7619f')) {
            echo 'Connected ok!';
        } else {
            throw new Exception('Authentication failed: ' . $smtp->getError()['error']);
        }
    }
} catch (Exception $e) {
    echo 'SMTP error: ' . $e->getMessage(), "\n";
}
//Whatever happened, close the connection.
$smtp->quit();
echo '</pre>';
/*



$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mailgun.org';                     // Specify main and backup SMTP servers
$mail->Port = '587';
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'postmaster@sandbox41c33954c5134d18bae098cc0c71710c.mailgun.org';   // SMTP username
$mail->Password = 'a91494f829e404100f16a6794c190a70-7ca144d2-d2f193a5';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, only 'tls' is accepted

$mail->From = 'postmaster@sandbox41c33954c5134d18bae098cc0c71710c.mailgun.org';
$mail->FromName = 'Mailer';
$mail->addAddress('sandroaf@unidavi.edu.br');                 // Add a recipient

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

$mail->Subject = 'Hello';
$mail->Body    = 'Testing some Mailgun awesomness';

echo "<PRE>";
print_r($mail);
echo "</PRE>";
/*
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}*/
?>