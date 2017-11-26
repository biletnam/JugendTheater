<?php
  function addNewUser(){
    $sql = "INSERT INTO Users DEFAULT VALUES";
    $DBconn->query($sql);
    echo "Done";
  }
 ?>
