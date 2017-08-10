<?php
function login(){
	global $user;
	global $DBconn;
	$username = gMS($_POST["Us"]);
	$password = gMS($_POST["Pw"]);
	$auto = true;  //To remember user with a cookie for autologin
	$user->logout(); //To prevent logging in with wrong credentials (if "login" fails, the user is still "Signed")
	$user->login($username,$password,$auto);

	if($user->isSigned()){
		$canEdit = false;
		$jgtdone = false;
		$query = "SELECT * FROM anmeldungen WHERE UserID=".$user->getProperty('ID');
 		if ($result=mysqli_query($DBconn,$query)){
   		if(mysqli_num_rows($result) > 0){$jgtdone = true;}
  	}
		if($user->getProperty("GroupID") >= 3){$canEdit = true;}
		echo gCTSilent("Successfully logged in!")."/".$user->getProperty("Username")."/".$canEdit."/".$jgtdone;
	}else{
		echo gCTSilent("Benutzername oder Passwort falsch.");
	}
}
?>
