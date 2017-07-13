<?php
session_start();
include('../config.php');
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
		<?php
		if($user->getProperty("Username") != "Guess"){$loggedIn = true;}
		include "build/topbar.php";

		if(isset($_GET['loc'])){
		    $loc = $_GET['loc'];
		}
		if(empty($loc) || $loc == ""){
				$loc = "home";
		}
		if(!file_exists("build/". $loc .".php")){$loc = "404";}
		include "build/" . $loc . ".php";

	 	include "build/footer.php";
		?>
		<!-- END footer -->
	</div>
	<!-- END page-->
	<?php
	include "build/modals.php";
	include "build/js.php";
	include "functions/notifier.php";
	checkMsg();
	if($loggedIn){
		echo "<script>loggedIn = true;</script>";
	}
	?>
	<!-- JS Definitions to find them later -->
	<script>
	    var loginBtn = document.getElementById("loginBtn");
	    var registerBtn = document.getElementById("registerBtn");
			var userIcon = document.getElementById("userIcon");
			var profileName = document.getElementById("profileName");
	</script>
	</body>
</html>
