<?php
function getAnmeldung(){
  global $DBconn;
  $query = "SELECT Json FROM anmeldungen WHERE ID=".$_POST['id'];
  $result = mysqli_query($DBconn, $query);
  $row = mysqli_fetch_assoc($result);
  echo $row['Json'];
}

 ?>
