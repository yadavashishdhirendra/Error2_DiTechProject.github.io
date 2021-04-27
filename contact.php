<?php
$msg="";
if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['Query'])){
	$name=($_POST['name']);
	$email=($_POST['email']);
	$phone=($_POST['phone']);
	$Query=($_POST['Query']);
	
	$msg="Message Sent Successfully";
	
	$html="<table><tr><td>Name</td><td>$name</td></tr><tr><td>EmailId</td><td>$email</td></tr><tr><td>Phone</td><td>$phone</td></tr><tr><td>Query</td><td>$Query</td></tr></table>";
	
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
	$mail->Subject="Contact Us Page";
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

