<?php
session_start();
include('../../config.php');
include('notifier.php');

include 'changeEmail.php';
include 'changePassword.php';
include 'imageUploader.php';
include 'login.php';
include 'logout.php';
include 'register.php';
include 'sendEmail.php';
include 'verification.php';

$defaultPath = "../";
$profilePath = "../";

$func = $_GET['func'];
switch($func){
    case "changeEmail": changeEmail(); break;
    case "changePassword": changePassword(); break;
    case "imageUploader": imageUploader(); break;
    case "login": login(); break;
    case "logout": logout(); break;
    case "register": register(); break;
    case "sendEmail": sendEmail(); break;
    case "verification": verification(); break;
    default: echo "NO FUNCTION FOUND!";
}
 ?>
