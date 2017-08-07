<?php
function premFileUploader(){
  include('checkUser.php');
  global $user;

  $file = 'premFile_'.$user->getProperty('Username');
  $targetPath = "../uploads/";
  $targetFile = $file;
  $fileLimit = 2;
  if (!empty($_FILES)) {
    if(count(glob($targetPath.$targetFile.$fileLimit.".*"))>0){
      $fileArray = glob($targetPath.$targetFile."1.*");
      unlink($fileArray[0]);

      for($counter = 1; $counter < $fileLimit; $counter++){
        $cmo = $counter+1;
        $fileArray = glob($targetPath.$targetFile.$cmo.".*");
        $ext = pathinfo($fileArray[0], PATHINFO_EXTENSION);
        rename($targetPath.$targetFile.$cmo.".".$ext,$targetPath.$targetFile.$counter.".".$ext);
      }
      move_uploaded_file($_FILES[$file]['tmp_name'],$targetPath.$targetFile.$fileLimit.".".pathinfo($_FILES[$file]['name'],PATHINFO_EXTENSION));
    } else {
      $counter = 1;
      while(count(glob($targetPath.$targetFile.$counter.".*"))>0){
        $counter = $counter + 1;
      }
      move_uploaded_file($_FILES[$file]['tmp_name'],$targetPath.$targetFile.$counter.".".pathinfo($_FILES[$file]['name'],PATHINFO_EXTENSION));
    }
   }
}
 ?>
