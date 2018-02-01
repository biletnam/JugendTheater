<?php
function logout(){
	include('checkUser.php');
	global $user;
	$user->logout();
	sendMsg(gCTSilent("You have been logged out."),true);
	header("Location: ../");
}
?>
