<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'vendor\phpmailer\phpmailer\src\SMTP.php';


if (array_key_exists('name', $_POST)) {
    $err = false;
    $msg = '';
    $name = '';

   // if (array_key_exists('name', $_POST)) {
        //Limit length and strip HTML tags
     //   $name = strip_tags($_POST['name']);
   // } else {
     //   $name = '';
  //  }  

    if (array_key_exists('company', $_POST)) {
        //Limit length and strip HTML tags
        $company = strip_tags($_POST['company']);
    } else {
        $company = '';
    }

    if (array_key_exists('job', $_POST)) {
        //Limit length and strip HTML tags
        $job = strip_tags($_POST['job']);
    } else {
        $job = '';
    }
    
    if (array_key_exists('phonenumber', $_POST)) {
        //Limit length and strip HTML tags
        $phonenumber = strip_tags($_POST['phonenumber']);
    } else {
        $phonenumber = '';
    }
    

    if (array_key_exists('email', $_POST) and PHPMailer::validateAddress($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $msg .= "Error: invalid email address provided";
        $err = true;
    }
    
    
    $uservalue=  $_POST["name"] . "," .  $_POST["company"] . "," .  $_POST["phonenumber"]  . "," . $_POST["email"]   . "," . $_POST["job"];

    $file=fopen("database.csv","a");

    fwrite($file,$uservalue."\n");
    fclose($file);
    
    if (!$err) {
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 2;                                                         // Enable verbose debug output1
        $mail->isSMTP();                                                             // Set mailer to use SMTP
        $mail->Host = 'smtp.sendgrid.net';                                          // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                                    // Enable SMTP authentication
        $mail->Username = 'azure_ade93e0a66da8ff0cd55cfa76c70dd3f@azure.com';     // SMTP username
        $mail->Password = 'password@123';                                        // SMTP password
        $mail->SMTPSecure = 'tls'; 
        $mail->Port = 587; 25;
        $mail->CharSet = 'utf-8';
        
        $mail->setFrom('marketing@relianceinfosystems.com', 'Reliance Infosystems');
        $mail->addAddress('adomokai@relianceinfosystems.com', 'Engage Us');
//        $mail->addCC('becky@relianceinfosystems.com');
        $mail->addReplyTo($email, $name);
        $mail->Subject = 'New Registration from Website (Abuja Tech Expo)';
        $mail->Body = <<<EOT
            Name: {$_POST['name']}
            \n
            Company: {$_POST['company']}
            \n
            Email: {$_POST['email']}
            \n
            Job Designation: {$_POST['job']}
            \n
            Phone Number: {$_POST['phonenumber']}
            EOT;
        
        if (!$mail->send()) {
            echo $msg .= "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo $msg .= "success";
        }
    }
    
        $mail->ClearAllRecipients();
        $mail->addAddress($email);
        $mail->addEmbeddedImage('../images/logoblack.png', 'logoblack.png');
        $mail->addEmbeddedImage('../images/checked.png', 'checked.png');
        $mail->addEmbeddedImage('../images/avaya.png', 'avaya.png');
        $mail->addEmbeddedImage('../images/microsoft.png', 'microsoft.png');
        $mail->addEmbeddedImage('../images/sophos.png', 'sophos.png');
        $mail->addEmbeddedImage('../images/reliance.png', 'reliance.png');
        
        $mail->isHTML(true);
        $mail->Subject = 'Abuja Tech Expo';
        $mail->Body = '
        <style type="text/css">
        html, body {
        margin: 0 !important;
        padding: 0 !important;
        height: 100% !important;
        width: 100% !important;
        }

        * {
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
        }

        .ExternalClass {
        width: 100%;
        }

        div[style*="margin: 16px 0"] {
        margin: 0 !important;
        }

        table, td {
        mso-table-lspace: 0pt !important;
        mso-table-rspace: 0pt !important;
        }

        table {
        border-spacing: 0 !important;
        border-collapse: collapse !important;
        table-layout: fixed !important;
        margin: 0 auto !important;
        }
        table table table {
        table-layout: auto;
        }

        img {
        -ms-interpolation-mode: bicubic;
        }

        .yshortcuts a {
        border-bottom: none !important;
        }

        a[x-apple-data-detectors] {
        color: inherit !important;
        }
        </style>

        <!-- Progressive Enhancements -->
        <style type="text/css">

        .button-td, .button-a {
        transition: all 100ms ease-in;
        }
        .button-td:hover, .button-a:hover {
        background: #555555 !important;
        border-color: #555555 !important;
        }
        </style>
        </head>
        <body width="100%" height="100%" bgcolor="#e0e0e0" style="margin: 0;" yahoo="yahoo">
        <table cellpadding="0" cellspacing="0" border="0" height="100%" width="100%" bgcolor="#e0e0e0" style="border-collapse:collapse;">
        <tr>
        <td><center style="width: 100%;">

        <!-- Visually Hidden Preheader Text : BEGIN -->
        <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;"> Your seat has been reserved.</div>
        <!-- Visually Hidden Preheader Text : END -->

        <div style="max-width: 600px;"> 
        <!--[if (gte mso 9)|(IE)]>
        <table cellspacing="0" cellpadding="0" border="0" width="600" align="center">
        <tr>
        <td>
        <![endif]--> 

        <!-- Email Header : BEGIN -->
        <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px;">
        <tr>
        <td style="padding: 20px 0; text-align: center"><img src="cid:logoblack.png" width="200" alt="logo" border="0"></td>
        </tr>
        </table>
        <!-- Email Header : END --> 

        <!-- Email Body : BEGIN -->
        <table cellspacing="0" cellpadding="0" border="0" align="center" bgcolor="#ffffff" width="100%" style="max-width: 600px;">

        <!-- Hero Image, Flush : BEGIN -->
        <tr><td style="height: 50px"></td></tr>
        <tr>    
        <td class="full-width-image" align="center" ><img src="cid:checked.png" width="300" alt="success" border="0" style="width: 30%; max-width: 300px; height: auto;"></td>
        </tr>
        <!-- Hero Image, Flush : END --> 

        <!-- 1 Column Text : BEGIN -->
        <tr>
        <td><table cellspacing="0" cellpadding="0" border="0" width="100%">
        <tr>
        <td style="padding: 40px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555; text-align: center">Dear ' . strip_tags($_POST['name']) . '
        <br><br>
        Thank you for Registering for the Abuja Technology Expo. We look forward to seeing you there. You can add the event to your calender by clicking the button below.<br>
        <br>
        Regards,
        <br>
        <strong>Reliance Infosystems.</strong>
        <br><br>
        <!-- Button : Begin -->

        <table cellspacing="0" cellpadding="0" border="0" align="center" style="margin: auto;">
        <tr>
        <td style="border-radius: 3px; background: #222222; text-align: center;" class="button-td"><a href="webcal://relianceinfosystems.com/abujatechexpo/php/calender.ics" style="background: #222222; border: 15px solid #222222; padding: 0 10px;color: #ffffff; font-family: sans-serif; font-size: 13px; line-height: 1.1; text-align: center; text-decoration: none; display: block; border-radius: 3px; font-weight: bold;" class="button-a"> 
        <!--[if mso]>&nbsp;&nbsp;&nbsp;&nbsp;<![endif]-->Add to Calender<!--[if mso]>&nbsp;&nbsp;&nbsp;&nbsp;<![endif]--> 
        </a></td>
        </tr>
        </table>
        </tr>
        </table></td>
        </tr>
        </table> 

        <table cellspacing="20px" cellpadding="20px" border="0" align="center" width="100%" style="max-width: 600px;">
        <tr>
        <td style="padding: 20px;"><img src="cid:reliance.png" width="100" alt="reliance logo" border="0"></td>
        <td style="padding: 20px;"><img src="cid:sophos.png" width="100" alt="sophos logo" border="0"></td>
        <td style="padding: 20px;"><img src="cid:microsoft.png" width="100" alt="microsoft-logo" border="0"></td>
        <td style="padding: 20px;"><img src="cid:avaya.png" width="100" alt="avaya-logo" border="0"></td>
        </tr>
        </table>

        </div>
        </center></td>
        </tr>
        </table>
        </body>';
        $mail->Send();
} ?>