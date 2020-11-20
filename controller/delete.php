<?php
    include "../model/db.php";

    $bno = $_GET['idx'];
    $sql = mq("delete from bd_board where bb_idx='$bno';");
    $sql2 = mq("delete from bd_comments where bb_idx='$bno';");
?>
<script>alert("삭제되었습니다");</script>
<meta http-equiv="refresh" content="0 url=/view/main.php" />

