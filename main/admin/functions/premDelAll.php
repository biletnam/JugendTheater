<?php
function premDelAll(){
  global $DBconn;
  $query = "DELETE FROM anmeldungen";
  mysqli_query($DBconn, $query);
}
 ?>
