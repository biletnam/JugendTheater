<?php
function changeBackImage(){
   $getName = 'back'.$_GET['dzID'];
   if (!empty($_FILES)) {
      $tempFile = $_FILES[$getName]['tmp_name'];
      $targetFile =  "../images/edit/" . $getName . ".jpg";
      move_uploaded_file($tempFile,$targetFile);
    }
}
 ?>
