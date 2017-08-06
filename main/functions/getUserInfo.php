<?php
function getUserInfo(){
  global $user;
  echo $user->getProperty('EnsembleName') . "/". $user->getProperty('StadtKanton');
}
 ?>
