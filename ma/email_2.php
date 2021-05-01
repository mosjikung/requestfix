<?php
date_default_timezone_set('Asia/Bangkok');
$times = date("Y-m-d");
include_once('connect.php');

$sendmail2 = 'nawarat@ntmail.local';
$sendmail3 = 'wirin@ntmail.local';
$sendmail4 = 'boonrat@ntmail.local';
$request = 'การแจ้งซ่อมของ  '.$username;


  $exmail = "From : $username ฝ่าย : $section <br>
  เรื่อง : $about วันที่ : $crt_time  ปัญหา : $problem <br>
  สถานที่ : $address <br>
  ตรวจสอบข้อมูลโดยการ login ที่ : <a href='http://192.168.23.6/requestfix'>คลิกที่นี่</a></br>";


  /**
  * This example shows making an SMTP connection with authentication.
  */
  //SMTP needs accurate times, and the PHP time zone MUST be set
  //This should be done in your php.ini, but this is how to do it if you don't have access to that

  require '../it/PHPMailer/PHPMailerAutoload.php';
  //Create a new PHPMailer instance
  $mail = new PHPMailer;
  $mail->CharSet = "utf-8";
  //Tell PHPMailer to use SMTP
  $mail->isSMTP();
  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 0;
  //Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';
  //Set the hostname of the mail server
  $mail->Host = "192.168.22.3";
  //Set the SMTP port number - likely to be 25, 465 or 587
  $mail->Port = 25;
  //Set the encryption system to use - ssl (deprecated) or tls
  $mail->SMTPSecure = 'none';
  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;
  //Username to use for SMTP authentication
  $mail->Username = "request.admin@ntmail.local";
  //Password to use for SMTP authentication
  $mail->Password = "Stepmail99";
  //Set who the message is to be sent from
  $mail->setFrom('request.admin@ntmail.local', 'Request admin');
  //Set who the message is to be sent to
  $mail->addAddress($sendmail2,$sendmail2);
  $mail->AddCC($sendmail3,$sendmail3);
  $mail->AddCC($sendmail4,$sendmail4);
  //Set the subject line
  $mail->Subject = $request;
  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  //$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
  $mail->msgHTML($exmail);
  //send the message, check for errors
  if (!$mail->send()) {
   echo "Mailer Error: " . $mail->ErrorInfo;
  } else {
  include_once('notiline.php');
  }
  ?>
