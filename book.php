<?php

if(isset($_POST["submit"])) {

require 'PHPMailer/PHPMailerAutoload.php';
   $mail = new PHPMailer;
   
   $to = $_POST['email'];

$mail->isSMTP();                            // Set mailer to use SMTP

//$mail->smtpConnect($mail->SMTPOptions)

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
                                             


 //  $mail->Host = 'smtp.sendgrid.net';             // Specify main and backup SMTP servers
                       // $mail->SMTPAuth = true;                     // Enable SMTP authentication
                    // $mail->Username = 'apikey';          // SMTP username
                    //$mail->Password = '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';          // SMTP password
                    //  $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
                                       //  $mail->Port = 587;                          // TCP port to connect to

    $mail->setFrom($_POST['email'], $_POST['firstname'].' '.$_POST['lastname']);
    $mail->addReplyTo($_POST['email']);
    $mail->addAddress('info@gurkhaoven.com');   // Add a recipient
  // $mail->addAddress('pawan.acharya@suneratech.com'); 
    $mail->addCC('ach1431rob@gmail.com');
//$mail->addBCC('bcc@example.com');

$mail->isHTML(true);  // Set email format to HTML

$bodyContent = $body = "<table table width='500' bgcolor='#CDD9F5' border='2' cellpadding='0' cellspacing='0'> 
 <tr>    <td><table width='500' border='0' cellspacing='0' cellpadding='8'>
			 <tr>
				<th colspan='2' bgcolor='#CDD9F5'><strong><font color='#EE3705'>Reservations</font></strong></th>
			 </tr>
			 <tr>
				<td  bgcolor='#FFFFDD'>FirstName :</td>
				<td bgcolor='#FFFFDD'>".$_POST['firstname']."</td>
			 </tr>
			  <tr>
				<td bgcolor='#FFFFFF'>LastName :</td>
				<td bgcolor='#FFFFFF'>".$_POST['lastname']."</td>
			 </tr>
			 <tr>
			  <td bgcolor='#FFFFDD'>E-mail : </td>
			  <td bgcolor='#FFFFDD'>".$_POST['email']."</td>
			</tr>
			 <tr>
				<td bgcolor='#FFFFFF'>Phone Number :</td>
				<td bgcolor='#FFFFFF'>".$_POST['icon_telephone']."</td>
			 </tr>
			 
			<tr>
			  <td bgcolor='#FFFFDD'>Reservation Date : </td>
			  <td bgcolor='#FFFFDD'>".$_POST['date']."</td>
			</tr>
			
			<tr>
			  <td bgcolor='#FFFFFF'>Reservation Time : </td>
			  <td bgcolor='#FFFFFF'>".$_POST['default_start_time']."</td>
			</tr>
			
			<tr>
			  <td bgcolor='#FFFFDD'>No. of Person? : </td>
			  <td bgcolor='#FFFFDD'>".$_POST['icon_person']."</td>
			</tr>
			
			<tr>
			  <td bgcolor='#FFFFFF'>Notes(Optional) : </td>
			  <td bgcolor='#FFFFFF'>".$_POST['address']."</td>
			</tr>
			<table>";

$mail->Subject = 'Gurkha-Oven Reservation Details ';
$mail->WordWrap   = 80; 
//var_dump($_FILES);
		//$mail->AddAttachment($_FILES['attach']['tmp_name'], $_FILES['attach']['name']);
$mail->Body    = $bodyContent;
if(!$mail->send()) {
    echo 'Message could not be sent. Server Failure! Please share your booking details through mails @ ( info@gurkhaoven.com )  Sorry for inconvenience caused!';
   // echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
		echo '<p id="para"></p>

		<script>
			window.location.href="Thankyou.html";	
		</script>';

	}
}
?>