<?php
include "../model/db.php";
include "../model/welcome.php";

$title = $_POST['title'];
$titl2 = htmlspecialchars($title);
$content = $_POST['content'];
$conten2 = htmlspecialchars($content);
$idx = $_SESSION['idx'];
$date =  date("Y-m-d h:i:s", strtotime("now"));
$bb_modify = null;

$uploads_dir = '../file/';
$tmpfile =  $_FILES['file']['tmp_name'];
$o_name = $_FILES['file']['name'];
$filename = iconv("UTF-8", "EUC-KR",$_FILES['file']['name']);
$allowed_ext = array('jpg', 'jpeg', 'png', 'gif', null);
$ext = array_pop(explode('.', $o_name));

if (!in_array($ext, $allowed_ext)) {
    echo "<script>alert('허용되지 않는 확장자입니다');history.back();</script>";
}
$folder = $uploads_dir.$filename;
move_uploaded_file($tmpfile,$folder);

$mqq = mq("alter table bd_board auto_increment =1");

if ($title && $content) {
    $sql = mq("insert into bd_board(bb_title, bb_content,bb_file, bm_idx, bb_reg_time, bb_modify_time) 
    value('".$titl2."','".$conten2."','".$o_name."','".$idx."','".$date."','".$bb_modify."')");
    echo "<script>alert('글쓰기가 완료되었습니다.'); location.href='../view/main.php';</script>";
} else {
    echo "<script>alert('글쓰기에 실패하였다');history.back();</script>";
}