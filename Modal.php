<?php
$msgs="";
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['role']) && isset($_POST['Budget']) && isset($_POST['WebsiteURL'])){
	$name=($_POST['name']);
	$email=($_POST['email']);
	$contact=($_POST['contact']);
	$role=($_POST['role']);
	$Budget=($_POST['Budget']);
	$WebsiteURL=($_POST['WebsiteURL']);
	
	$msgs="Message Sent Successfully";
	
	$html="<table><tr><td>Name</td><td>$name</td></tr><tr><td>EmailId</td><td>$email</td></tr><tr><td>Contact</td><td>$contact</td></tr><tr><td>Role</td><td>$role</td></tr><tr><td>Budget</td><td>$Budget</td></tr><tr><td>WebsiteURL</td><td>$WebsiteURL</td></tr></table>";
	
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
	$mail->Subject="Contact Us Form(Modal)";
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
	echo $msgs;
}
?>

