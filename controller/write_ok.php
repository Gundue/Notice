<?php
/*
*  글 작성 승인
*  pgw
*  2020-11-27
*  date 수정
*/
include "../model/session.php";
include "../model/db.php"; // db connection

$title = $_POST['title'];
$titl2 = htmlspecialchars($title);     // xss 방어
$content = $_POST['content'];
$conten2 = htmlspecialchars($content);
$idx = $_SESSION['idx'];               // 작성자 idx
$date =  date("Y-m-d", strtotime("now"));
$bb_modify = null;
$null = null;

$uploads_dir = '../file/';                // 업로드할 파일 경로
$tmpfile =  $_FILES['file']['tmp_name'];  // 임시 파일명
$o_name = time().$_FILES['file']['name'];        // 원래 파일명
$filename = iconv("UTF-8", "EUC-KR",$o_name);
$allowed_ext = array('jpg', 'jpeg', 'png', 'gif', null);  //업로드 가능 확장자
$ext = array_pop(explode('.', $o_name));

if (!in_array($ext, $allowed_ext)) {  // 확장자 검사
    echo "<script>alert('허용되지 않는 확장자입니다');history.back();</script>";
    exit();
}

$folder = $uploads_dir.$filename;
move_uploaded_file($tmpfile,$folder);


if ($title && $content) {
    $sql = mq("insert into bd_board(bb_title, bb_content,bb_file, bm_idx, bb_reg_time, bb_modify_time) 
    value('".$titl2."','".$conten2."','".$o_name."','".$idx."','".$date."','".$bb_modify."')");
    echo "<script>alert('글쓰기가 완료되었습니다.'); location.href='../view/main.php';</script>";
} else {
    echo "<script>alert('글쓰기에 실패하였다');history.back();</script>";
}   

$mqq = mq("alter table bd_board auto_increment =1"); //auto_increment 초기화