
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
	<?php include "build/js.php"; ?>
	</body>
</html>
