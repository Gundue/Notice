<?php
/*
* 로그아웃
*/
    include "../model/db.php";
    
    session_destroy();
    setcookie('cookieID', $userid, time()-604800, "/"); //쿠키삭제
?>
<meta charset="utf-8">
<script>alert("로그아웃되었습니다"); location.href="/";</script>