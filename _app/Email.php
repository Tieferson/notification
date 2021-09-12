<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use stdClass;

class Email
{

    private $mail = \stdClass::class;

    public function __construct()
    {

        $this->mail = new PHPMailer(true);

        $this->mail->SMTPDebug = $_ENV['MAIL_DEBUG'];                      //Enable verbose debug output
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = $_ENV['MAIL_SMTP'];                     //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = $_ENV['MAIL_LOGIN'];                     //SMTP username
        $this->mail->Password   = $_ENV['MAIL_SECRET'];                               //SMTP password
        $this->mail->SMTPSecure = $_ENV['MAIL_SECURE'];            //Enable implicit TLS encryption
        $this->mail->Port       = $_ENV['MAIL_PORT'];                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $this->mail->CharSet = 'UTF-8';
        $this->mail->setLanguage('br');
        $this->mail->isHTML(true);
        $this->mail->setFrom($_ENV['MAIL_SENDER'], $_ENV['MAIL_NAME']);
    }
    public function sendMail($subject, $body, $replyEmail, $replayName, $addressEmail, $addressName)
    {
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;
        $this->mail->addReplyTo($replyEmail, $replayName);
        $this->mail->addAddress($addressEmail, $addressName);

        try {
            $this->mail->send();
        } catch (Exception $e) {
            echo "Erro ao enviar e-mail {$this->mail->ErrorInfo} {$e->getMessage()}";
        }
    }
}
