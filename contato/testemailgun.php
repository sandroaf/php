<?php
$to      = 'sandroaf@unidavi.edu.br';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: sandroaf@unidavi.edu.br' . "\r\n" .
    'Reply-To: sandroaf@unidavi.edu.br' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
?>