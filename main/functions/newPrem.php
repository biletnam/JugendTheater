<?php
function createPrem($fileType){
  global $user;
  global $DBconn;
  $sql = "INSERT INTO premieren (UserID, Produktion, Spieler, PremiereDatum, Ort, Beschrieb, Video, Bilder) VALUES ('".$user->getProperty('ID')."', '".$_POST['name']."', '".$_POST['spieler']."','".$_POST['datum']."','".$_POST['ort']."','".$_POST['beschrieb']."','".$_POST['video']."','". $fileType . "')";
  if ($DBconn->query($sql) === TRUE) {
    $last_id = $DBconn->insert_id;
    rename("../uploads/img_".$user->getProperty('Username').$fileType, "../uploads/" . $last_id . $fileType);
    echo "Success!";
  } else {
    echo "Error: " . $sql . "<br>" . $DBconn->error;
  }
}

function newPrem(){
  include('checkUser.php');
  if(file_exists("../uploads/img_".$user->getProperty('Username').".jpg")){
    createPrem(".jpg");
  }elseif (file_exists("../uploads/img_".$user->getProperty('Username').".png")) {
    createPrem(".png");
  }elseif (file_exists("../uploads/img_".$user->getProperty('Username').".gif")) {
    createPrem(".gif");
  } else {
    echo "Bitte laden Sie ein Bild hoch.";
  }
}

 ?>
