<?php
if(!isset($langAuto)){$langAuto = false;}
if($langAuto){
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
}

function gCT($std){
	global $DBconn;
	$stdLang = "std";
	$defaultLang = "de";
	$lang = isset($_GET['ln']) ? $_GET['ln'] : $stdLang;
	if($lang == ""){ $lang = $defaultLang; }

	$result = mysqli_query($DBconn,"SHOW COLUMNS FROM content LIKE '".$lang."'");
	$exists = (mysqli_num_rows($result))?TRUE:FALSE;
	if(!$exists){ $lang = $defaultLang;}

	$sql = "SELECT ".$lang." FROM content WHERE ".$stdLang."='".$std."'";
	$result = mysqli_query($DBconn, $sql);
	if(mysqli_num_rows($result) == 0){
		$sql = "INSERT INTO content (".$stdLang.",".$defaultLang.",fr,it) VALUES ('".$std."','".$std."','".$std."','".$std."')";
		mysqli_query($DBconn, $sql);
		echo $std;
	} else {
		echo mysqli_fetch_array($result)[0] ;
	}

}

function gCTSilent($std){
	global $DBconn;
	$stdLang = "std";
	$defaultLang = "de";
	$lang = isset($_GET['ln']) ? $_GET['ln'] : $stdLang;
	if($lang == ""){ $lang = $defaultLang; }

	$result = mysqli_query($DBconn,"SHOW COLUMNS FROM content LIKE '".$lang."'");
	$exists = (mysqli_num_rows($result))?TRUE:FALSE;
	if(!$exists){ $lang = $defaultLang;}

	$sql = "SELECT ".$lang." FROM content WHERE ".$stdLang."='".$std."'";
	$result = mysqli_query($DBconn, $sql);
	if(mysqli_num_rows($result) == 0){
		$sql = "INSERT INTO content (".$stdLang.",".$defaultLang.",fr,it) VALUES ('".$std."','".$std."','".$std."','".$std."')";
		mysqli_query($DBconn, $sql);
		return $std;
	} else {
		return mysqli_fetch_array($result)[0] ;
	}

}

function removeqsvar($url, $varname) {
	return preg_replace('/([?&])'.$varname.'=[^&]+(&|$)/','$1',$url);
}
 ?>
