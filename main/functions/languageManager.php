<?php
$oldUrl = $_SERVER['REQUEST_URI'];

if(strpos($oldUrl, '?') !== false){
} else {
	header("Location: ".$oldUrl."?");
}

if(isset($_GET['newln'])){
	$_SESSION['lang'] = $_GET['newln'];
	$oldUrl = removeqsvar($oldUrl,"ln");
	$oldUrl = removeqsvar($oldUrl,"newln");
	header("Location: ".$oldUrl);
}

if(!isset($_GET['ln'])){
	if(isset($_SESSION['lang'])){
		if (strpos($oldUrl, '?') !== false) {
      $newUrl = $oldUrl . '&ln=' . $_SESSION['lang'];
    } else {
      $newUrl = $oldUrl . '?ln=' . $_SESSION['lang'];
    }
		header("Location: ".$newUrl);
	}
}

function gCT($std){
	global $DBconn;
	$stdLang = "de";
	$lang = isset($_GET['ln']) ? $_GET['ln'] : $stdLang;
	if($lang == ""){ $lang = $stdLang; }

	$result = mysqli_query($DBconn,"SHOW COLUMNS FROM content LIKE '".$lang."'");
	$exists = (mysqli_num_rows($result))?TRUE:FALSE;
	if(!$exists){ $lang = $stdLang;}

	$sql = "SELECT ".$lang." FROM content WHERE ".$stdLang."='".$std."'";
	$result = mysqli_query($DBconn, $sql);
	if(mysqli_num_rows($result) == 0){
		$sql = "INSERT INTO content (".$stdLang.") VALUES ('".$std."')";
		mysqli_query($DBconn, $sql);
		echo $std;
	}
	echo mysqli_fetch_array($result)[0] ;
}

function removeqsvar($url, $varname) {
	return preg_replace('/([?&])'.$varname.'=[^&]+(&|$)/','$1',$url);
}
 ?>
