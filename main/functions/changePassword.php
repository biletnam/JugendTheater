<?php
function changePassword(){
	include('checkUser.php');
	global $profilePath;

	$input = new ptejada\uFlex\Collection($_POST);
	$suc = false;
	$msg = "";
	if($input->pwd == $input->pwd2){
		$hash = new ptejada\uFlex\Hash();
	  $pw = array(
	    "password" => $hash->generateUserPassword($user, $input->pwd)
	  );
		$suc = $user->update($pw);
	  if($suc){
	    $msg = "Password has been changed.";
	  } else {
	    $msg = "Password could not be changed.";
	  }
	} else {
		$msg = "The passwords do not match!";
	}
	echo $msg;
}
?>
