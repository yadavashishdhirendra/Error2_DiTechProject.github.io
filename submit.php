<?php
$msg="";
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['company_name']) && isset($_POST['website_add']) && isset($_POST['message'])){
	$name=($_POST['name']);
	$email=($_POST['email']);
	$contact=($_POST['contact']);
	$company_name=($_POST['company_name']);
	$website_add=($_POST['website_add']);
	$message=($_POST['message']);
	
	$msg="Message Sent Successfully";
	
	$html="<table><tr><td>Name</td><td>$name</td></tr><tr><td>EmailId</td><td>$email</td></tr><tr><td>Contact</td><td>$contact</td></tr><tr><td>Company_Name</td><td>$company_name</td></tr><tr><td>Website</td><td>$website_add</td></tr><tr><td>Message</td><td>$message</td></tr></table>";
	
	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host="smtp.gmail.com";
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="sales@ditechcdm.com";
	$mail->Password="15SepT2016"; 
	$mail->SetFrom("sales@ditechcdm.com");
	$mail->addAddress("sales@ditechcdm.com");
	$mail->IsHTML(true);
	$mail->Subject="Contact Us Form";
	$mail->Body=$html;
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if($mail->send()){
		//echo "Mail send";
	}else{
		//echo "Error occur";
	}
	echo $msg;
}
?>

