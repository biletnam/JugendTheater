<?php
session_start();
include('../../../config.php');
include('notifier.php');

include 'login.php';
include 'logout.php';
include 'changeActivation.php';
include 'changePrem.php';
include 'getUserInfo.php';
include 'delUser.php';
include 'changeUser.php';
include 'getAnmeldung.php';
include 'delJgt.php';
include 'changeJgt.php';
include 'getFileInfos.php';

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
    case "delJgt": delJgt(); break;
    case "changeJgt": changeJgt(); break;
    case "getFileInfos": getFileInfos(); break;
    default: echo "NO FUNCTION FOUND!";
}
 ?>
