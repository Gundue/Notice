<?php
    include "../model/db.php";

    global $db;

    $userid =  mysqli_real_escape_string ($db, $_POST['userid']);
    $userpw = mysqli_real_escape_string ($db, $_POST['userpw']);
    $userpw2 = mysqli_real_escape_string ($db, $_POST['userpw2']);
    $encrypted_password = password_hash($userpw2, PASSWORD_DEFAULT);
    $username = mysqli_real_escape_string ($db, $_POST['name']);
    $adress_code = $_POST['adress_code'];
    $adress = $_POST['adress'];
    $adress_detail = $_POST['adress_detail'];
    $reg_time = date("Y-m-d", strtotime("now"));
    $login_time = date("Y-m-d h:i:s", strtotime("now"));

    $id_check = mq("select * from bd_member where bm_id='$userid'");
        $id_check = mysqli_fetch_array($id_check);
        if($id_check >= 1){
          echo "<script>alert('아이디가 증복됩니다.'); history.back();</script>";
        } else {
          $sql = mq("insert into bd_member(bm_id,bm_pw,bm_name,bm_adress_code,bm_adress,bm_adress_detail,bm_reg_time, bm_login_time)
          values('".$userid."')");

     if($userpw != $userpw2){
        echo "<script>alert('비밀번호 불일치'); history.back();</script>";
        return false;
        exit();
    }
    if($userid == null || $userpw == null || $username == null)
    {
      echo "<script>alert('빈칸이 존재합니다'); history.back(); </script>";
      exit();
    }

    $sql = mq("insert into bd_member(bm_id,bm_pw,bm_name,bm_adress_code,bm_adress,bm_adress_detail,bm_reg_time, bm_login_time)
    values('".$userid."','".$encrypted_password."','".$username."','".$adress_code."','".$adress."','".$adress_detail."','".$reg_time."','".$login_time."')");
?>

<meta charset="utf-8"/>
<script>alert("회원가입완료")</script>
<meta http-equiv="refresh" content="0 url=/">
  <?php } ?>