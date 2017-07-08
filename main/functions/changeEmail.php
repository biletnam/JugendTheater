<?php
function changeEmail(){
	include('checkUser.php');
	global $profilePath;
	$input = new ptejada\uFlex\Collection($_POST);
	if($input->email == $input->email2){
		$msg = "Email has been changed to: " . $input->email;
		$suc = $user->setProperty("email",$input->email);
	}else {
		$msg = "Die Email-Adressen müssen übereinstimmen!";
		$suc = false;
	}
	echo $msg;
}
?>
