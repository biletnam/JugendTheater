<?php
session_start();
include('../../config.php');
include('notifier.php');
include('languageManager.php');

include 'changeEmail.php';
include 'changePassword.php';
include 'imageUploader.php';
include 'login.php';
include 'logout.php';
include 'register.php';
include 'verification.php';
include 'newPrem.php';
include 'changeCity.php';
include 'changeEname.php';
include 'imageResize.php';
include 'getPremInfo.php';
include 'delPrem.php';
include 'changePrem.php';
include 'forgotPw.php';
include 'resetPw.php';
include 'jgt.php';
include 'techUploader.php';
include 'fileUploader.php';
include 'getUserInfo.php';
include 'delUploads.php';
include 'premFileUploader.php';
include 'getPremFileInfos.php';
include 'getFileInfos.php';
include 'getAnmeldung.php';
include 'logger.php';

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
    case "verification": verification(); break;
    case "newPrem": newPrem(); break;
    case "changeEname": changeEname(); break;
    case "changeCity": changeCity(); break;
    case "getPremInfo": getPremInfo(); break;
    case "delPrem": delPrem(); break;
    case "changePrem": changePrem(); break;
    case "forgotPw": forgotPw(); break;
    case "resetPw": resetPw(); break;
    case "jgt": jgt(); break;
    case "techUploader": techUploader(); break;
    case "fileUploader": fileUploader(); break;
    case "getUserInfo": getUserInfo(); break;
    case "delUploads": delUploads(); break;
    case "premFileUploader": premFileUploader(); break;
    case "getPremFileInfos": getPremFileInfos(); break;
    case "getFileInfos": getFileInfos(); break;
    case "getAnmeldung": getAnmeldung(); break;
    case "logPHP": logPHP(); break;
    default: echo "NO FUNCTION FOUND!";
}
 ?>
