<?php
    include "../model/db.php";

    $bno = $_GET['idx'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sql = mq("update bd_board set bb_title = '".$title."', bb_content='".$content."' where bb_idx = '".$bno."'");
?>
<script>alert("수정되었습니다");</script>
<meta http-equiv="refresh" content="0 url=/view/read.php?idx=<?php echo $bno; ?>">