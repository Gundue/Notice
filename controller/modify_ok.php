<?php
    include "../model/db.php";

    $bno = $_GET['idx'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date("Y-m-d h:i:s", strtotime("now"));
    
    $sql = mq("update bd_board set bb_title = '".$title."', bb_content='".$content."', bb_modify_time='".$date."' where bb_idx = '".$bno."'");
?>
<script>alert("수정되었습니다");</script>
<meta http-equiv="refresh" content="0 url=/view/read.php?idx=<?php echo $bno; ?>">