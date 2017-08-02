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
include 'getUserInfo.php';
include 'delUser.php';
include 'changeUser.php';
include 'getAnmeldung.php';

$defaultPath = "../";
$profilePath = "../";

$func = $_GET['func'];
switch($func){
    case "login": login(); break;
    case "logout": logout(); break;
    case "changeActivation": changeActivation(); break;
    case "changePrem": changePrem(); break;
    case "getUserInfo": getUserInfo(); break;
    case "delUser": delUser(); break;
    case "changeUser": changeUser(); break;
    case "getAnmeldung": getAnmeldung(); break;
    default: echo "NO FUNCTION FOUND!";
}
 ?>
