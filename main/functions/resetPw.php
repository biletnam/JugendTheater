<?php
function resetPw(){
  global $user;
  $hash = $_POST["hash"];
  $pw = array(
     'Password' => $_POST['pw1'],
     'Password2' => $_POST['pw2']
   );
   $suc = $user->newPassword($hash,$pw);
   if($suc){
     echo "Success/Passwort wurde geändert.";
   } elseif($_POST['pw1'] != $_POST['pw2']){
     echo "Passwörter stimmen nicht überein.";
   } else {
     echo "Passwort konnte nicht geändert werden. Versuche es nochmal.";
   }
}
?>
