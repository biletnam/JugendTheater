<?php
			include("libs/uFlex/autoload.php");
			$DBhost = 'localhost';
			$DBuser = 'wpp_jgt';
			$DBpw = 'jgtdbpwd';
			$DBname = 'wpp_jgt';
			$langAuto = true;

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
				return mysqli_real_escape_string($DBconn,$string);
			}

			function gMSS($string){
				global $DBconn;
				return mysqli_real_escape_string($DBconn,htmlentities($string));
			}

			function umlautFix($s){
			  $s = str_replace("Ã¤","ä",$s);
			  $s = str_replace("Ã„","Ä",$s);
			  $s = str_replace("Ã¶","ö",$s);
			  $s = str_replace("Ã–","Ö",$s);
			  $s = str_replace("Ã¼","ü",$s);
			  $s = str_replace("Ãœ","Ü",$s);
			  $s = str_replace("ÃŸ","ß",$s);
			  return $s;
			}

?>
