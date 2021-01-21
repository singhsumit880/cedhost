<?php

$email = $_POST['email'];
$token = $_POST['token'];
include_once './class/User.php';
$insert_token = new User();
$insert_token->update_token($token, $email);

require "vendor/autoload.php";

$robo = 'singhsumit880@gmail.com';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$developmentMode = true;
$mailer = new PHPMailer($developmentMode);

try {
    $mailer->SMTPDebug = 2;
    $mailer->isSMTP();

    if ($developmentMode) {
        $mailer->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ];
    }

    $mailer->Host = 'ssl://smtp.gmail.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'singhsumit880@gmail.com';
    $mailer->Password = 'Sumit@123';
    $mailer->SMTPSecure = 'ssl';
    $mailer->Port = 465;

    $mailer->setfrom('singhsumit880@gmail.com', 'Admin');
    $mailer->addAddress($email, 'Name of recipient');

    $mailer->isHTML(true);
    $mailer->Subject = 'PHPMailer Test';
    $email = md5($email);
    $mailer->Body = 'This is a <a type="button" class="btn btn-sucess" href="http://localhost/cedhost/token.php?id=' . $token . '&email=' . $email . '">Click here to Activate';

    $mailer->send();
    $mailer->ClearAllRecipients();
    echo "MAIL HAS BEEN SENT SUCCESSFULLY";
} catch (Exception $e) {
    echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
}
