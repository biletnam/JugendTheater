<?php
function delUploads(){
  global $user;
  global $DBconn;
  $query = "SELECT Json FROM anmeldungen WHERE UserID=".$user->getProperty("ID");
  $result = mysqli_query($DBconn, $query);
  $delFiles = true;
  if(mysqli_num_rows($result) > 0){
   $delFiles = false;
  }
  $Uname = $user->getProperty("Username");
  if($delFiles){
    if(file_exists("../uploads/tech_".$Uname.".pdf")){
      unlink("../uploads/tech_".$Uname.".pdf");
    }
    foreach (glob("../uploads/file_".$Uname."*.*") as $fname) {
      unlink($fname);
    }
  }
  foreach (glob("../uploads/img_".$Uname."*.*") as $filename) {
    unlink($filename);
  }

  foreach (glob("../uploads/premFile_".$Uname."*.*") as $filename) {
    unlink($filename);
  }
}
 ?>
