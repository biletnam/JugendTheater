<?php
function delJgt(){
  global $DBconn;
  $sql="DELETE FROM anmeldungen WHERE ID=".$_POST['id'];
  mysqli_query($DBconn, $sql);
}
 ?>
