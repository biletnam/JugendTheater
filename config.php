<?php
			include("libs/uFlex/autoload.php");
			$DBhost = 'localhost';
			$DBuser = 'wpp_jgt';
			$DBpw = 'jgtdbpwd';
			$DBname = 'wpp_jgt';

			$user = new ptejada\uFlex\User();
			$user->config->database->host = $DBhost;
			$user->config->database->user = $DBuser;
			$user->config->database->password = $DBpw;
			$user->config->database->name = $DBname;
			$user->start();

			$DBconn = mysqli_connect($DBhost, $DBuser, $DBpw,$DBname);

			function getContent($id){
				$lang = isset($_GET['ln']) ? $_GET['ln'] : 'en';
				if($lang == ""){ $lang = "en"; }

				$result = mysql_query("SHOW COLUMNS FROM content LIKE '".$lang."'");
				$exists = (mysql_num_rows($result))?TRUE:FALSE;
				if(!$exists){ $lang = "en";}

				$sql = "SELECT ".$lang." FROM content WHERE ID='".$id."'";
				$result = mysql_query($sql);
				if(mysql_num_rows($result) == 0){ return "DBND"; }
				return mysql_fetch_array($result)[0] ; // . "<!-- DB-ID: ".$id." -->"  add to show everywhere the code
			}
?>
