<?php
global $user;
global $defaultPath;
	if($user->getProperty("Username") == "Guess"){
		echo "You are not logged in!";
		die();
	}

?>
