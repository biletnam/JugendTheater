<?php
function changeContent(){
  global $DBconn;
  $sql = "UPDATE content SET de='".gMS($_POST['de'])."',fr='".gMS($_POST['fr'])."',it='".gMS($_POST['it'])."' WHERE ID=".$_POST['id'];
  if ($DBconn->query($sql) === TRUE) {
    echo "Success!";
  } else {
    echo "Error: " . $sql . "<br>" . $DBconn->error;
  }
}
?>
