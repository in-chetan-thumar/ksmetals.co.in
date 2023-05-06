<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include_once(__DIR__.'/../vendor/autoload.php');

function send_mail($data)
{
    $mail = new PHPMailer(true);

    try {
        // $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host       = 'smtp.office365.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'noreply@ksmetals.co.in';
        $mail->Password   = 'qjfyfcvvnxfvfxhz';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;
        $mail->SMTPDebug = false;
        $mail->setFrom('noreply@ksmetals.co.in', 'KS Metals');
        $mail->addAddress('customer.connect@kscheemagroup.com');
        // $mail->addAddress('receiver2@gfg.com', 'Name');

        $mail->isHTML(true);
        $mail->Subject = 'New enquiry from KS Metals website';
        $mail->Body    = 'Hello Team, <br/><br/><br/>
        You received an inquiry from '.$data['first_name'].' form. <br/><br/>
        Name: '.$data['first_name'].' '.$data['last_name'].'<br/><br/>
        Email Address: '.$data['email'].'<br/><br/>
        Product Interested: '.$data['multicheckbox'].'<br/><br/>
        Message: '.$data['message'].'<br/><br/>
        Date and Time: '.date('d-m-Y H:i:s').'<br/><br/><br/>
        
        Kind regards, <br/><br/>
        Team ';
        $mail->AltBody = 'Body in plain text for non-HTML mail clients';
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";exit;
    }
}
