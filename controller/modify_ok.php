<?php
    include "../model/db.php";

    $bno = $_GET['idx'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date("Y-m-d h:i:s", strtotime("now"));
if(!file_exists($_FILES['file']['tmp_name']) || !is_uploaded_file($_FILES['file']['tmp_name'])){
    $sql = mq("update bd_board set bb_title = '".$title."', bb_content='".$content."', bb_modify_time='".$date."' where bb_idx = '".$bno."'");
}else{
    $uploads_dir = '../file/';
    $tmpfile =  $_FILES['file']['tmp_name'];
    $o_name = $_FILES['file']['name'];
    $filename = iconv("EUC-KR","UTF-8" ,$_FILES['file']['name']);
    $allowed_ext = array('jpg', 'jpeg', 'png', 'gif', null);
    $ext = array_pop(explode('.', $o_name));
    
    if (!in_array($ext, $allowed_ext)) {
        echo "<script>alert('허용되지 않는 확장자입니다');history.back();</script>";
    }
    $folder = $uploads_dir.$filename;
    move_uploaded_file($tmpfile,$folder);
        
        $sql = mq("update bd_board set bb_title = '".$title."', bb_content='".$content."', bb_modify_time='".$date."',bb_file = '".$o_name."' where bb_idx = '".$bno."'");
    
}

?>
<script>alert("수정되었습니다");</script>
<meta http-equiv="refresh" content="0 url=/view/read.php?idx=<?php echo $bno; ?>">