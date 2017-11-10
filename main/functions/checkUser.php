<?php
global $user;
	if($user->getProperty("Username") == "Guess"){
		echo gCTSilent("You are not logged in!");
		die();
	}

?>
