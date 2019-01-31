<?php

if(isset($_POST["submit"])) {

require 'PHPMailer/PHPMailerAutoload.php';
   $mail = new PHPMailer;
   
   $to = $_POST['u_email'];

$mail->isSMTP();                            // Set mailer to use SMTP

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

  $mail->Host =  'localhost';    // Must be GoDaddy host name
                   $mail->SMTPAuth = false; 
                   $mail->Username = 'info@gurkhaoven.com';
                              $mail->Password = 'Kathmandu1431';
                                      $mail->SMTPSecure = false;   // ssl will no longer work on GoDaddy CPanel SMTP
                                         $mail->Port = 25;    // Must use port 587 with TLS
                          $mail->SSLAuth = false;
                                                                     // TCP port to connect to

    $mail->setFrom($_POST['u_email'], $_POST['u_name']);
    $mail->addReplyTo($_POST['u_email']);
    $mail->addAddress('info@gurkhaoven.com');   // Add a recipient
  // $mail->addAddress('pawan.acharya@suneratech.com'); 
    $mail->addCC('ach1431rob@gmail.com');
//$mail->addBCC('bcc@example.com');


$mail->isHTML(true);  // Set email format to HTML

$bodyContent = $body = "<table table width='500' bgcolor='#CDD9F5' border='2' cellpadding='0' cellspacing='0'> 
 <tr>    <td><table width='500' border='0' cellspacing='0' cellpadding='8'>
			 <tr>
				<th colspan='2' bgcolor='#CDD9F5'><strong><font color='#EE3705'>Career Mail for Gurkha-Oven </font></strong></th>
			 </tr>
			 <tr>
				<td  bgcolor='#FFFFDD'>Name :</td>
				<td  bgcolor='#FFFFDD'>".$_POST['u_name']."</td>
			 </tr>
			 <tr>
			  <td  bgcolor='#FFFFFF'>E-mail : </td>
			  <td  bgcolor='#FFFFFF'>".$_POST['u_email']."</td>
			</tr>
			 <tr>
				<td  bgcolor='#FFFFDD'>Position :</td>
				<td  bgcolor='#FFFFDD'>".$_POST['u_position']."</td>
			 </tr>
			 
			<tr>
			  <td  bgcolor='#FFFFFF'>Message : </td>
			  <td  bgcolor='#FFFFFF'>".$_POST['message']."</td>
			</tr>
			<table>";

$mail->Subject = 'Inquiry From Website about Career';
$mail->WordWrap   = 80; 
//var_dump($_FILES);
		$mail->AddAttachment($_FILES['attach']['tmp_name'], $_FILES['attach']['name']);
$mail->Body    = $bodyContent;
if(!$mail->send()) {
    echo 'Message could not be sent. Server Failure! Please share your career details through mails @ ( info@gurkhaoven.com )  Sorry for inconvenience caused!';
    //echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
		echo '<p id="para"></p>

		<script>
			window.location.href="Thankyou.html";	
		</script>';

	}
}
?>