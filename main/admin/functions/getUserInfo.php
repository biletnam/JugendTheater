<?php
  function getUserInfo() {
    global $DBconn;
    $query = "SELECT Username,Email,GroupID,EnsembleName,StadtKanton FROM Users WHERE ID=".$_POST['id'];
    $result = mysqli_query($DBconn, $query);
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
  }


 ?>
