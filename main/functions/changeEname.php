<?php
function changeEname(){
	include('checkUser.php');
	$input = new ptejada\uFlex\Collection($_POST);
		$msg = gCTSilent("EnsembleName wurde geändert zu: ") . $input->name;
		$suc = $user->setProperty("EnsembleName",gMS($input->name));
	echo $msg;
}
?>
