<?php
session_start();
$DomainUrlPath = "https://jugend-theater.ch";
include('../config.php');
$langAuto = true;
include("functions/languageManager.php");
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<?php include "build/header.php";?>
	</head>
	<body>
		<div id="preloader"></div>
	<div id="fh5co-page">
		<?php $loggedIn = false;
		if($user->getProperty("Username") != "Guess"){$loggedIn = true;}
		include "build/topbar.php";

		if(isset($_GET['loc'])){
		    $loc = $_GET['loc'];
		}
		if(empty($loc) || $loc == ""){
				$loc = "home";
		}
		if(!file_exists("sites/". $loc .".php")){$loc = "404";}
		include "sites/" . $loc . ".php";

	 	include "build/footer.php";
		?>
		<!-- END footer -->
	</div>
	<!-- END page-->
	<?php
	echo '<script>var loggedIn = false;var jgtdone = false;</script>';
	include "build/modals.php";
	include "build/js.php";
	include "functions/notifier.php";
	checkMsg();
	if($loggedIn){
		echo '<script>loggedIn = true;loc = "'.$loc.'";</script>';
		$query = "SELECT * FROM anmeldungen WHERE UserID=".$user->getProperty('ID');
 		if ($result=mysqli_query($DBconn,$query)){
   		if(mysqli_num_rows($result) > 0){
				echo '<script>jgtdone = true;</script>';
			}
  	}
	}
	?>
	<!-- JS Definitions to find them later -->
	<script>
	    var loginBtn = document.getElementById("loginBtn");
	    var registerBtn = document.getElementById("registerBtn");
			var userIcon = document.getElementById("userIcon");
			var profileName = document.getElementById("profileName");
			var langDrop = document.getElementById("langDrop");
	</script>
	</body>
</html>
