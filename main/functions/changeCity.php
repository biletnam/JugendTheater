<?php
function changeCity(){
	include('checkUser.php');
	$input = new ptejada\uFlex\Collection($_POST);
	$msg = gCTSilent("Stadt,Kanton geändert zu: ") . $input->city;
	$suc = $user->setProperty("StadtKanton",gMS($input->city));
	echo $msg;
}
?>
