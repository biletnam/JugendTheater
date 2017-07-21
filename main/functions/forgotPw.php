<?php
function forgotPw(){
  global $user;
  global $DBconn;
  $input = new ptejada\uFlex\Collection($_POST);
  if(filter_var($input->usr_mail, FILTER_VALIDATE_EMAIL)) {
    $usr = $input->usr_mail;
  } else {
    $query = "SELECT * FROM Users WHERE Username='".$input->usr_mail."'";
    $result = mysqli_query($DBconn, $query);
    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $usr = $row["Email"];
    } else {$usr = "";}
  }

  $prehash = $user->resetPassword($usr);
    if(!$prehash){
      echo "Ungültiger Benutzername/Email";
    } else {
      $to      = $usr;
      $subject = 'Password reset';
      $message = 'Click this link to reset your password: <a href="https://jugend-theater.ch/?loc=resetPassword&hash='.$prehash->Confirmation.'">Reset Password</a>';
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      $headers .= 'From: <info@jugend-theater.ch>' . "\r\n";
      $suc = mail($to, $subject, $message, $headers);
      if(!$suc){
        echo "Could not send Email. Please enter a valid Email-Address.";
      } else {
        echo "Email gesendet!";
      }
    }
}
 ?>
