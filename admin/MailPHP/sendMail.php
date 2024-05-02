<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
//Create an instance; passing `true` enables exceptions
class Mailer
{

    public function sendMail($title, $content, $sendMail)
    {
        $mail = new PHPMailer(true);
        $mail->CharSet = ('UTF-8');
        try {

            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'phamhuutritestmail@gmail.com';                     //SMTP username
            $mail->Password   = 'xcdqmevlbtncvtpq';                               //SMTP password
            $mail->SMTPSecure = T_SL;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('phamhuutritestmail@gmail.com', 'BranShop');
            $mail->addAddress($sendMail, '');     //Add a recipient
            $mail->addAddress('trib2000144@student.ctu.edu.vn', 'Admin');               //Name is optional
            $mail->addReplyTo('phamhuutritestmail@gmail.com', 'BrandShop');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $title;
            $mail->Body    = $content;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Đã gửi thành công';
        } catch (Exception $e) {
            echo "Email không được gửi: Chi tiết lỗi {$mail->ErrorInfo}";
        }
    }
}
