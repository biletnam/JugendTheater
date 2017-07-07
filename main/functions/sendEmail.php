<?php
function sendEmail(){
	$input = new ptejada\uFlex\Collection($_POST);
	global $profilePath;
	$to	= "info@uprank.ch";
	$subject = 'Support';
	$message = $input->msg;
	$headers = "MIME-Version: 1.0\n";
	$headers .= "Content-type:text/html;charset=UTF-8\n";
	$headers .= "From: <". $input->email .">\n";
	$suc = mail($to, $subject, $message, $headers);
	$msg = "";
	if(!$suc){
		$msg = "<b>Error:</b> Could not send Email.";
	} else {
		$msg = "Email successfully send!";
	}
	sendMsg($msg,$suc);
	header("Location: ".$profilePath);
}
?>
