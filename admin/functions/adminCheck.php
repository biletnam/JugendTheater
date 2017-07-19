<?php
if($loggedIn){
  if($user->getProperty("GroupID")<3){
    $loggedIn = false;
    clearMsg();
    sendMsg("Sie haben keine Rechte!",false);
    $user->logout();
  }
}
 ?>
