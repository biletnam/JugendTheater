<?php
function changeActivation(){
  global $DBconn;
  $premID = $_POST["id"];
  $act = $_POST["activation"];
  $sql = "UPDATE premieren SET Activation=".$act." WHERE ID=".$premID;
  if ($DBconn->query($sql) === TRUE) {
    echo "Success!";
  } else {
    echo "Error: " . $sql . "<br>" . $DBconn->error;
  }

}
 ?>
