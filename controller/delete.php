<?php
/*
*  게시글 삭제
*  pgw
*  2020-11-26
*  주석 추가
*/
    include "../model/db.php";

    $bno = $_GET['idx']; // 게시글의 idx
    $sql = mq("delete from bd_board where bb_idx='$bno';");     // idx에 해당하는 글 삭제
    $sql2 = mq("delete from bd_comments where bb_idx='$bno';"); // idx에 해당하는 댓글 삭제
?>
<script>alert("삭제되었습니다");</script>
<meta http-equiv="refresh" content="0 url=/view/main.php" />

