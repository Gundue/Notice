<?php
/*
*  세션검사
*  pgw
*  2020-11-27
*  isset -> !isset으로 수정
*/
    if(!isset($_SESSION['userid'])){
        echo "<script>alert('잘못된접근입니다');location.href='../view/login.php';</script>";
    }
?>