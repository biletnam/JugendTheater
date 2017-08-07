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

			$DBconn = mysqli_connect($DBhost, $DBuser, $DBpw, $DBname);
			$DBconn->set_charset("utf8");

			function gMS($string){
			  global $DBconn;
				return mysqli_real_escape_string($DBconn,htmlentities($string));
			}

			function gCT($std){
				global $DBconn;
				$lang = isset($_GET['ln']) ? $_GET['ln'] : 'de';
				if($lang == ""){ $lang = "de"; }

				$result = mysqli_query($DBconn,"SHOW COLUMNS FROM content LIKE '".$lang."'");
				$exists = (mysqli_num_rows($result))?TRUE:FALSE;
				if(!$exists){ $lang = "de";}

				$sql = "SELECT ".$lang." FROM content WHERE de='".$std."'";
				$result = mysqli_query($DBconn, $sql);
				if(mysqli_num_rows($result) == 0){
					$sql = "INSERT INTO content (de) VALUES ('".$std."')";
					mysqli_query($DBconn, $sql);
					echo $std;
				}
				echo mysqli_fetch_array($result)[0] ;
			}


?>
