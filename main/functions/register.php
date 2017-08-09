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
		$subject = 'Account aktivieren';
		$msg1 =  file_get_contents('../mails/register1.html');
		$msg2 =  file_get_contents('../mails/register2.html');
		$message = $msg1 . "https://jugend-theater.ch/functions/functions.php?func=verification&hsh=". $hash . $msg2;
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <info@jugend-theater.ch>' . "\r\n";
		$suc = mail($to, $subject, $message, $headers);
		if(!$suc){
			$msg = "Email konnte nicht gesendet werden. Prüfen Sie die Email-Adresse";
			$sql="DELETE FROM Users WHERE Username=".$_POST['us'];
	    mysqli_query($DBconn, $sql);
		} else {
			$msg = "Email versendet!";
		}
	}
	echo $msg;
}
?>
