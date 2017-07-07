<?php
function register(){
	global $user;
  $hash = $user->register(array(
        'Username'  => $_POST["us"],
        'Password'  => $_POST["pw"],
        'Email'     => $_POST["email"],
  ),true);

	$msg = "";
	$suc = false;
	if(is_bool($hash) == true){
		foreach($user->log->getErrors() as $err){
            $msg = $msg . "{$err}. ";
    }
	} else {
		$to      = $_POST["email"];
		$subject = 'Email Verification';
		$message = 'Click this link to activate your account: <a href="https://test.jugend-theater.ch/functions/functions.php?func=verification&hsh='.$hash.'">Verify now!</a>';
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <info@uprank.ch>' . "\r\n";

		$suc = mail($to, $subject, $message, $headers);
		if(!$suc){
			$msg = "Could not send Email. Please enter a valid Email-Address.";
		} else {
			$msg = "Registration successful!";
		}
	}
	echo $msg;
}
?>
