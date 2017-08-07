<?php
function getPremFileInfos(){
  global $DBconn;
  $sql = "SELECT UserID FROM premieren WHERE ID=".$_POST['id'];
  $result = mysqli_query($DBconn, $sql);
  $row = mysqli_fetch_assoc($result);
  $UserID = $row['UserID'];
  $sql = "SELECT Username FROM Users WHERE ID=".$UserID;
  $result = mysqli_query($DBconn, $sql);
  $row = mysqli_fetch_assoc($result);
  $Uname = $row['Username'];
  $res = "";
  foreach (glob("../uploads/".$_POST['id']."premFile_".$Uname."*.*") as $fname) {
    $res = $res . "/" . basename($fname);
  }
  $res = substr($res, 1);
  echo $res;
}
 ?>
