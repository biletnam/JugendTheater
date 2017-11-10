<?php
session_start();
include('../../config.php');
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
		<?php include "functions/notifier.php";
		$loggedIn = false;
		if($user->getProperty("Username") != "Guess"){$loggedIn = true;}
		include "functions/adminCheck.php";
		include "build/topbar.php";
		if(isset($_GET['loc'])){$loc = $_GET['loc'];}
		if(empty($loc) || $loc == ""){$loc = "premieren";}
		if(!$loggedIn){$loc = "login";}
		if(!file_exists("sites/". $loc .".php")){$loc = "404";}
		include "sites/" . $loc . ".php";

	 	include "build/footer.php";
		?>
		<!-- END footer -->
	</div>
	<!-- END page-->
	<?php
	echo '<script>var loggedIn = false;</script>';
	echo '<script>var allowEdit= false;</script>';
	include "build/modals.php";
	include "build/js.php";
	checkMsg();
	if($loggedIn){
		echo '<script>loggedIn = true;loc = "'.$loc.'";</script>';
	}
	if($user->isSigned() && $user->getProperty("GroupID") >= 4){
		echo '<script>allowEdit = true;</script>';
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
