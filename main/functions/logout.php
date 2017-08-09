<?php
function logout(){
	include('checkUser.php');
	global $user;
	global $defaultPath;
	$user->logout();
	sendMsg("You have been logged out.",true);
	header("Location: ../");
}
?>
