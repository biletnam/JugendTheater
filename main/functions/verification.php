<?php
function verification(){
	global $user;
	global $defaultPath;
	$suc = $user->activate(gMS($_GET['hsh']));
	$msg = "";
	if(!$suc){
			$msg = "<b>".gCTSilent("Error: ")."</b>" .gCTSilent("Could not verify. Try again.");
	} else {
			$msg = gCTSilent("Verification successful!");
	}

	sendMsg($msg,$suc);
	header("Location: ".$defaultPath);
}
?>
