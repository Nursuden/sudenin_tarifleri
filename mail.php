<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function mailGonder($email,$adi){ 


    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPKeepAlive = true;
    $mail->SMPTAuth = true;
    $mail->SMTPSecure = 'tls'; //ssl

    $mail->Port = 587; //25, 465, 587
    $mail->Host = "mail.ozgurkurumsal.com";

    $mail->Username = "nursuden@ozgurkurumsal.com";
    $mail->Password = "f$arm?2{_s#4";

    $mail->setFrom('nursuden@ozgurkurumsal.com', 'Nursuden');

    $mail->addReplyTo('nursudenakkaya7@gmail.com', 'Nursuden');

    $mail->addAddress($email, $adi);

    $mail->Subject = 'Sudenin Tarifleri';  
    $mail->Body    = 'Her daim ileri ';
    $mail->AltBody = '<3';


    $variables = array();
    $variables['adsoyad'] = $adi . " " . $soyadi;
    $variables['aktivasyonlinki'] = $ac_Link;
    $template = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/MailHTMLs/mail-kart.html");
    foreach($variables as $key => $value)
    {
        $template = str_replace('{{ '.$key.' }}', $value, $template);
    }
    $mail_body = $template;
    $mail->MsgHTML($mail_body);



    $mail->Send();




    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo '';
    }

}

?>