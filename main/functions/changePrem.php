<?php
  function changePremDB($fileType){
    global $user;
    global $DBconn;
    $sql = "UPDATE premieren SET Produktion='".gMS($_POST['name'])."',Spieler='".gMS($_POST['spieler'])."',PremiereDatum='".gMS($_POST['datum'])."',Ort='".gMS($_POST['ort'])."',Beschrieb='".gMS($_POST['beschrieb'])."',Video='".gMS($_POST['video'])."',Bilder='".$fileType."',Activation=0, addDates='".gMS($_POST['jon'])."' WHERE ID=".$_POST['id'];
    if ($DBconn->query($sql) === TRUE) {
      echo "Success!/".$fileType;
    } else {
      echo "Error: " . $sql . "<br>" . $DBconn->error;
    }
  }

  function changePremImage($fileType){
    global $user;
    unlink("../uploads/" . $_POST['id'] . $_POST['filetype']);
    unlink("../uploads/small/" . $_POST['id'] . $_POST['filetype']);
    rename("../uploads/img_".$user->getProperty('Username').$fileType, "../uploads/" . $_POST['id'] . $fileType);
    uploadResize("../uploads/" . $_POST['id'] . $fileType,"../uploads/small/" . $_POST['id'] . $fileType);
  }

  function changePrem(){
    include('checkUser.php');
    if(file_exists("../uploads/img_".$user->getProperty('Username').".jpg")){
      changePremImage(".jpg");
      changePremDB(".jpg");
    }elseif (file_exists("../uploads/img_".$user->getProperty('Username').".png")) {
      changePremImage(".png");
      changePremDB(".png");
    }elseif (file_exists("../uploads/img_".$user->getProperty('Username').".gif")) {
      changePremImage(".gif");
      changePremDB(".gif");
    } elseif (file_exists("../uploads/img_".$user->getProperty('Username').".jpeg")) {
      changePremImage(".jpeg");
      changePremDB(".jpeg");
    } else {
      changePremDB($_POST['filetype']);
    }
    foreach (glob("../uploads/".$_POST['id']."premFile_".$user->getProperty('Username')."*.*") as $filename) {
      unlink($filename);
    }
    foreach (glob("../uploads/premFile_".$user->getProperty('Username')."*.*") as $fname) {
      rename($fname, "../uploads/" . $_POST['id'] . basename($fname));
    }
  }


 ?>
