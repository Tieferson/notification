<?php

require __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/../");
$dotenv->load();

use Notification\Email;


$mail=new Email;



$mail->sendMail("Teste de email","Seus <b>bagulhos</b>","tieferson.domingos@octio.com.br","Tieferson","tiefersond@yahoo.com.br","Tieferson");

?>