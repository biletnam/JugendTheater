<?php
session_start();
include('../../../config.php');
include('notifier.php');

function gMS($string){
  global $DBconn;
  return mysqli_real_escape_string($DBconn,$string);
}

include 'login.php';
include 'logout.php';
include 'changeActivation.php';
include 'changePrem.php';

$defaultPath = "../";
$profilePath = "../";

$func = $_GET['func'];
switch($func){
    case "login": login(); break;
    case "logout": logout(); break;
    case "changeActivation": changeActivation(); break;
    case "changePrem": changePrem(); break;
    default: echo "NO FUNCTION FOUND!";
}
 ?>
