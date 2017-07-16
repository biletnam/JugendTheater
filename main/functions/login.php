<?php
function login(){
	global $user;
	$username = gMS($_POST["Us"]);
	$password = gMS($_POST["Pw"]);
	$auto = true;  //To remember user with a cookie for autologin
	$user->logout(); //To prevent logging in with wrong credentials (if "login" fails, the user is still "Signed")
	$user->login($username,$password,$auto);

	if($user->isSigned()){
		echo "Successfully logged in!";
	}else{
		echo "Username or password wrong.";
	}
}
?>
