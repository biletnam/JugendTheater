<?php
  function delUser() {
    global $DBconn;
    $sql="DELETE FROM Users WHERE ID=".$_POST['id'];
    mysqli_query($DBconn, $sql);
  }
 ?>
