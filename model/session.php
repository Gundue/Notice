<?php
/*
*  세션관리
*  pgw
*  2020-11-27
*  생성 및 코드작성
*/

session_start();

if(!isset($_SESSION['userid']) && $_SESSION['userid'] == "") {
    echo "<script>alert('잘못된접근입니다');location.href='../view/login.php';</script>";
}
