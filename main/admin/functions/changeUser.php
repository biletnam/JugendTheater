<?php
function changeUser(){
  if(gMS($_POST['email']) == ""){
    UserDBChange();
  } else {
    if(filter_var(gMS($_POST['email']), FILTER_VALIDATE_EMAIL)) {
      UserDBChange();
    } else {
        echo "Email ungültig!";
    }
  }

}

function UserDBChange(){
  global $DBconn;
  $sql = "UPDATE Users SET Username='".gMS($_POST['name'])."',Email='".gMS($_POST['email'])."',EnsembleName='".gMS($_POST['ename'])."',StadtKanton='".gMS($_POST['city'])."',GroupID=".gMS($_POST['group']).",Activated=".gMS($_POST['act'])." WHERE ID=".$_POST['id'];
  if ($DBconn->query($sql) === TRUE) {
    echo "Success!";
  } else {
    echo "Error: " . $sql . "<br>" . $DBconn->error;
  }
}
 ?>
