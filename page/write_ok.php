<?php
include "../db.php";
include "../welcom.php";

$title = $_POST['title'];
$content = $_POST['content'];
$file = null;
$idx = $_SESSION['idx'];
$date = strtotime("now");
$dat2 = date("Y-m-d", $date);
$bb_modify = null;

if($title && $content){
    $sql = mq("insert into bd_board(bb_title, bb_content,bb_file, bm_idx, bb_reg_time, bb_modify_time) value('".$title."','".$content."','".$file."','".$idx."','".$dat2."','".$bb_modify."')");
    echo "<script>alert('글쓰기가 완료되었습니다.'); location.href='/page/main.php';</script>";
} else {
    echo "<script>alert('글쓰기에 실패하였다');history.back();</script>";
}

$tmpfile =  $_FILES['b_file']['tmp_name'];
$o_name = $_FILES['b_file']['name'];
$filename = iconv("UTF-8", "EUC-KR",$_FILES['b_file']['name']);
$folder = "../../upload/".$filename;
move_uploaded_file($tmpfile,$folder);