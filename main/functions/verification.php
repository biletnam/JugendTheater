<?php
function verification(){
	global $user;
	global $defaultPath;
	$suc = $user->activate($_GET['hsh']);
	$msg = "";
	if(!$suc){
			$msg = "<b>Error:</b> Could not verify. Try again.";
	} else {
			$msg = "Verification successful!";
	}

	sendMsg($msg,$suc);
	header("Location: ".$defaultPath);
}
?>
