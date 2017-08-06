<?php
function register(){
	global $user;
	global $DBconn;
  $hash = $user->register(array(
        'Username'  => gMS($_POST["us"]),
        'Password'  => gMS($_POST["pw"]),
        'Email'     => gMS($_POST["email"]),
				'StadtKanton' => gMS($_POST["city"]),
				'EnsembleName' => gMS($_POST["ename"])
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
		$message = 'Click this link to activate your account: <a href="https://jugend-theater.ch/functions/functions.php?func=verification&hsh='.$hash.'">Verify now!</a>';
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <info@jugend-theater.ch>' . "\r\n";
		$suc = mail($to, $subject, $message, $headers);
		if(!$suc){
			$msg = "Could not send Email. Please enter a valid Email-Address.";
			$sql="DELETE FROM Users WHERE Username=".$_POST['us'];
	    mysqli_query($DBconn, $sql);
		} else {
			$msg = "Email versendet!";
		}
	}
	echo $msg;
}
?>
