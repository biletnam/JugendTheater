<?php
// TODO: Get Ensemble + City for Jgt
function getUserInfo(){
  global $user;
  echo $user->getProperty('EnsembleName') . "/". $user->getProperty('StadtKanton');
}
 ?>
