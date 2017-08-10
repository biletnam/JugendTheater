<?php
function changeEmail(){
	include('checkUser.php');
	global $profilePath;
	$input = new ptejada\uFlex\Collection($_POST);
	if($input->email == $input->email2){
		$msg = gCTSilent("Email has been changed to: ") . $input->email;
		$suc = $user->setProperty("email",gMS($input->email));
	}else {
		$msg = gCTSilent("Die Email-Adressen müssen übereinstimmen!");
		$suc = false;
	}
	echo $msg;
}
?>
