<?php
/*
* 댓글 작성 승인
*/
    include "../model/db.php";

    $bno = $_GET['idx'];     // 게시물의 idx
    $idx = $_SESSION['idx']; // 댓글 작성자
    $date = strtotime("now");
    $dat2 = date("Y-m-d", $date);

    if($bno && $_POST['bc_content']){
        $sql = mq("insert into bd_comments(bb_idx, bm_idx, bc_content, bc_reg_time) values('".$bno."','".$idx."','".$_POST['bc_content']."','".$dat2."')");
        echo "<script>location.href='../view/read.php?idx=$bno';</script>";
    } else {
        echo "<script>alert('댓글을 입력하세요.');history.back();</script>";
    }
?>