<?php
	
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../vendor/autoload.php';

 	$to_email = "info@samplits.com";
        // echo($to_email);
        $mail = new PHPMailer();
        // configure an SMTP
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
                
        // $mail->Username = 'jhonnyalberto343@gmail.com';
        // $mail->Password = 'ofxoilzcvwxkiqxi';

        $mail->Username = $to_email;
        $mail->Password = 'gpunqrdtdnyrpxiw';
        
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($to_email, 'Your Hotel');
        $mail->addAddress($to_email, 'Me');
        $mail->Subject = 'Thanks for choosing Our Hotel!';

        // Set HTML 
        $mail->isHTML(TRUE);
        $mail->Body = 'body';
        // add attachment
        // $mail->addAttachment('//confirmations/yourbooking.pdf', 'yourbooking.pdf');
        if(!$mail->Send()){
            echo json_encode(['response' => $mail->ErrorInfo]);
        } else {
            echo json_encode(['response' => 'Email sent Success']);
        }