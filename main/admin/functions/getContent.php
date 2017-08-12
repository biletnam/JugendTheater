<?php
function getContent(){
  global $DBconn;
  $query = "SELECT * FROM content WHERE ID=".$_POST['id'];
  $result = mysqli_query($DBconn, $query);
  $row = mysqli_fetch_assoc($result);
  echo json_encode($row);
}
 ?>
