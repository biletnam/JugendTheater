<?php
function changeEmail(){
	include('checkUser.php');
	global $profilePath;
	$input = new ptejada\uFlex\Collection($_POST);
	$msg = "Email has been changed to: " . $input->new_email;
	$suc = $user->setProperty("email",$input->new_email);
	sendMsg($msg,$suc);

	header("Location: ".$profilePath);
}
?>
