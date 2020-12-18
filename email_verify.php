<?php

/**
 * Php version 7.2.10
 * 
 * @category Components
 * @package  Packagename
 * @author   Sumit kumar Pandey <pandeysumit399@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://localhost/training/php%20mysql%20task1/register/signup.php
 */
session_start();
require "vendor/autoload.php";
if (isset($_SESSION['data'])) {
    $email = $_SESSION['data']['email'];
    $activation_code = $_SESSION['data']['code'];
}
$robo = 'mastertron399@gmail.com';

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
    $mailer->Username = 'mastertron399@gmail.com';
    $mailer->Password = '9125457091';
    $mailer->SMTPSecure = 'ssl';
    $mailer->Port = 465;

    $mailer->setFrom('mastertron399@gmail.com', 'Name of sender');
    $mailer->addAddress($email, 'Name of recipient');

    $mailer->isHTML(true);
    $mailer->Subject = 'PHPMailer Test';
    $mailer->Body = 'This is a <b>verification<b> email sent by a <b>CEDCOSS Technologies<b>
    <a href="http://192.168.2.77/training/CedHosting/verify.php?key='.$activation_code.'">Click HERE For</a>';

    $mailer->send();
    $mailer->ClearAllRecipients();
    echo "MAIL HAS BEEN SENT SUCCESSFULLY";
    echo "<script>window.location.href='PageVerify.php'</script>";
} catch (Exception $e) {
    echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
}
