<?php
function logPHP(){
  global $user;
  $UName = $user->getProperty('Username');
  $logRoot = "../logs/";
  $currentLogDir = $logRoot . date("Y-m-d");

  if (!file_exists($currentLogDir)) {
      mkdir($currentLogDir);
  }

  $logFile = fopen($currentLogDir . "/" . $UName . "_log.txt","a");
  fwrite($logFile, "\n");
  fwrite($logFile, $_POST['msg']);
  fclose($logFile);
  echo("Logged");
}

?>
