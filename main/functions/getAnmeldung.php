<?php
function getAnmeldung(){
  global $DBconn;
  $query = "SELECT * FROM anmeldungen WHERE UserID=" . $_POST['id'];
  $result = mysqli_query($DBconn, $query);
  $row = mysqli_fetch_assoc($result);
  echo json_encode($row);
}

 ?>
