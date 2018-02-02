<?php
function createPrem($fileType){
  global $user;
  global $DBconn;
  $sql = "INSERT INTO premieren (UserID, Produktion, Spieler, PremiereDatum, Ort, Beschrieb, Video, Bilder, addDates) VALUES ('".$user->getProperty('ID')."', '".gMS($_POST['name'])."', '".gMS($_POST['spieler'])."','".gMS($_POST['datum'])."','".gMS($_POST['ort'])."','".gMS($_POST['beschrieb'])."','".gMS($_POST['video'])."','". $fileType . "', '".gMS($_POST['jon'])."')";
  if ($DBconn->query($sql) === TRUE) {
    $last_id = $DBconn->insert_id;
    rename("../uploads/img_".$user->getProperty('Username').$fileType, "../uploads/" . $last_id . $fileType);
    foreach (glob("../uploads/premFile_".$user->getProperty('Username')."*.*") as $fname) {
      rename($fname, "../uploads/" . $last_id . basename($fname));
    }
    uploadResize("../uploads/" . $last_id . $fileType,"../uploads/small/" . $last_id . $fileType);
    echo gCTSilent("Success!")."/".$last_id."/".$fileType."/".$_POST['name'];
  } else {
    echo gCTSilent("Error: ") . $sql . "<br>" . $DBconn->error;
  }
}

function newPrem(){
$Uname = $_POST['profName'];
  if ( file_exists("../uploads/img_".$Uname.".jpg") ){
    createPrem(".jpg");
    return;
  }

  if ( file_exists("../uploads/img_".$Uname.".png") ){
    createPrem(".png");
    return;
  }

  if ( file_exists("../uploads/img_".$Uname.".gif") ){
    createPrem(".gif");
    return;
  }

  if ( file_exists("../uploads/img_".$Uname.".jpeg") ){
    createPrem(".jpeg");
    return;
  }

  echo gCTSilent("Bitte laden Sie ein Bild hoch.");
}

 ?>
