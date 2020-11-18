<?php
    include "../model/db.php";
    session_destroy();
    setcookie('cookieID', $userid, time()-604800, "/");
?>
<meta charset="utf-8">
<script>alert("로그아웃되었습니다"); location.href="/";</script>