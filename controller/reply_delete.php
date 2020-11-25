<?php
    include "../model/db.php";

    $bno = $_GET['bb_idx']; 
    $rno = $_GET['idx'];

    $sql = mq("delete from bd_comments where bc_idx = ".$rno);
    echo "<script>location.href='../view/read.php?idx=$bno';</script>";
?>

