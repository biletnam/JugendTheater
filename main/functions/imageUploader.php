<?php
function imageUploader(){
 include('checkUser.php');
 global $user;
 $ds = DIRECTORY_SEPARATOR;
 $storeFolder = 'uploads';
 $getName = 'img_'.$user->getProperty('Username');
 if (!empty($_FILES)) {
    $tempFile = $_FILES[$getName]['tmp_name'];
    $targetPath = ".." . $ds . $storeFolder . $ds;
    $targetFile =  $targetPath . $getName . "." . pathinfo($_FILES[$getName]['name'], PATHINFO_EXTENSION);
    foreach (glob($targetPath.$getName."*.*") as $filename) {
      unlink($targetPath.$filename);
    }
    move_uploaded_file($tempFile,$targetFile);
  }
}
?>
