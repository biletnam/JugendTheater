<?php
function delJgt(){
  global $DBconn;
  $sql = "SELECT UserID FROM anmeldungen WHERE ID=".$_POST['id'];
  $result = mysqli_query($DBconn, $sql);
  $row = mysqli_fetch_assoc($result);
  $UserID = $row['UserID'];
  $sql = "SELECT Username FROM Users WHERE ID=".$UserID;
  $result = mysqli_query($DBconn, $sql);
  $row = mysqli_fetch_assoc($result);
  $Uname = $row['Username'];

  if(file_exists("../../uploads/tech_".$Uname.".pdf")){
    unlink("../../uploads/tech_".$Uname.".pdf");
  }
  foreach (glob("../../uploads/file_".$Uname."*.*") as $fname) {
    unlink($fname);
  }
  
  $sql="DELETE FROM anmeldungen WHERE ID=".$_POST['id'];
  mysqli_query($DBconn, $sql);
}
 ?>
