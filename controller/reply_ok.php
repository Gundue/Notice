<?php
    include "../model/db.php";

    $bno = $_GET['idx'];
    $idx = $_SESSION['idx'];
    $date = strtotime("now");
    $dat2 = date("Y-m-d", $date);

    if($bno && $_POST['bc_content']){
        $sql = mq("insert into bd_comments(bb_idx, bm_idx, bc_content, bc_reg_time) values('".$bno."','".$idx."','".$_POST['bc_content']."','".$dat2."')");
        echo "<script>alert('댓글이 작성되었습니다'); location.href='../view/read.php?idx=$bno';</script>";
    } else {
        echo "<script>alert('댓글작성에 실패하였습니다.');history.back();</script>";
    }

?>