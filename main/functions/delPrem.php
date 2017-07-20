<?php
function delPrem(){
  global $DBconn;
  $query = "SELECT * FROM premieren WHERE ID=".$_POST['id'];
  $result = mysqli_query($DBconn, $query);
  $row = mysqli_fetch_assoc($result);
  unlink("../../uploads/" . $row['ID'] . $row['Bilder']);
  unlink("../../uploads/small/" . $row['ID'] . $row['Bilder']);
  $sql="DELETE FROM premieren WHERE ID=".$row['ID'];
  mysqli_query($DBconn, $sql);
}
 ?>
