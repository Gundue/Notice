<?php
/*
*  로그아웃
*  pgw
*  2020-11-26
*  주석 추가
*/
    
session_unset();   //세션 변수의 등록 해지
session_destroy(); // 세션 아이디의 삭제

setcookie('cookieID', $userid, time()-604800, "/"); //쿠키삭제
?>
<meta charset="utf-8">
<script>alert("로그아웃되었습니다"); location.href="/";</script>