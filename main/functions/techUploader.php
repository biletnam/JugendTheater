<?php
function techUploader(){
  include('checkUser.php');
  global $user;

  $file = 'tech_'.$user->getProperty('Username');
  $targetPath = "../uploads/";
  $targetFile = $file;
  if (!empty($_FILES)) {
     foreach (glob($targetPath.$targetFile."*.*") as $filename){ unlink($targetPath.$filename);}
     move_uploaded_file($_FILES[$file]['tmp_name'],$targetPath.$targetFile.".".pathinfo($_FILES[$file]['name'],PATHINFO_EXTENSION));
   }
}
 ?>
