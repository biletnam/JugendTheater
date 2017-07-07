<?php
global $user;
global $defaultPath;
	if($user->getProperty("Username") == "Guess"){
		sendMsg("You are not logged in!",false);
		header("Location: ".$defaultPath);
		die();
	}

?>
