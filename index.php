<?php

require __DIR__ . "/lib_ext/autoload.php";

use Notification\Email;

$mail=new Email;
$mail->sendMail("Teste de email","Seus bagulhos","tieferson.domingos@octio.com.br","Tieferson","tiefersond@yahoo.com.br","Tieferson");

?>