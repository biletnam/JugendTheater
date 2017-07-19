<?php
session_start();
include('../../config.php');
include('notifier.php');

function gMS($string){
  global $DBconn;
  return mysqli_real_escape_string($DBconn,$string);
}

include 'login.php';
include 'logout.php';
include 'getPremInfo.php';

$defaultPath = "../";
$profilePath = "../";

$func = $_GET['func'];
switch($func){
    case "login": login(); break;
    case "logout": logout(); break;
    case "getPremInfo": getPremInfo(); break;
    default: echo "NO FUNCTION FOUND!";
}
 ?>
