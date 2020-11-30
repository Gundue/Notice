<?php
/*
*  댓글 삭제
*  pgw
*  2020-11-26
*  주석추가
*/
    include "../model/session.php";
    include "../model/db.php";

    $bno = $_GET['bb_idx']; // 게시물의 idx 
    $rno = $_GET['idx'];    // 댓글 idx
    
    $sql = mq("delete from bd_comments where bc_idx = ".$rno); //댓글 idx값이 일치하면 삭제
    echo "<script>location.href='../view/read.php?idx=$bno';</script>";
?>

