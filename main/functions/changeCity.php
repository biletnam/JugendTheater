<?php
function changeCity(){
	include('checkUser.php');
	$input = new ptejada\uFlex\Collection($_POST);
	$msg = "Stadt,Kanton geändert zu: " . $input->city;
	$suc = $user->setProperty("StadtKanton",$input->city);
	echo $msg;
}
?>
