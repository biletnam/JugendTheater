<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php
	session_start();
	include('../config.php');
	include "build/header.php";
 ?>
	<body>
	<div id="fh5co-page">
		<?php include "build/topbar.php";

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
	include "functions/notifier.php";
	include "build/js.php";
	?>
	<script>
	    var loginBtn = document.getElementById("loginBtn");
	    var registerBtn = document.getElementById("registerBtn");
			var userIcon = document.getElementById("userIcon");
	</script>
	</body>
</html>
