<?php
    include "../model/db.php";

    $rno = $_POST['rno'];
    $sql = mq("delete from bd_comments where bc_content = '$rno'");
?>
<script>alert("댓글삭제");</script>
<meta http-equiv="refresh" content="0 url=/view/main.php" />

