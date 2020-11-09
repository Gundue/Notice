<?php
    include "../db.php";
    #include "../password.php";

    $userid = $_POST['userid'];
    $userpw = $_POST['userpw'];
    #$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
    $username = $_POST['name'];
    $adress_code = $_POST['adress_code'];
    $adress = $_POST['adress'];
    $adress_detail = $_POST['adress_detail'];
    $reg_time = null;
    $login_time = null;

    $sql = mq("insert into bd_member(bm_id,bm_pw,bm_name,bm_adress_code,bm_adress,bm_adress_detail,bm_reg_time, bm_login_time) 
    values('".$userid."','".$userpw."','".$username."','".$adress_code."','".$adress."','".$adress_detail."','".$reg_time."','".$login_time."')");
?>

<meta charset="utf-8"/>
<script>alert("회원가입완료")</script>
<meta http-equiv="refresh" content="0 url=/">