<?php
    include "../db.php";
    #include "../password.php";

    $userid = $_POST['userid'];
    $userpw = $_POST['userpw'];
    $userpw2 = $_POST['userpw2'];
    #$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
    $username = $_POST['name'];
    $adress_code = $_POST['adress_code'];
    $adress = $_POST['adress'];
    $adress_detail = $_POST['adress_detail'];
    $reg_time = date("Y/m/d");
    $login_time = time();

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
    if($userid == null || $userpw == null || $username == null || $adress_code == null || $adress == null || $adress_detail == null)
    {
      echo "<script>alert('빈칸이 존재합니다'); history.back(); </script>";
      exit();
    }

    $sql = mq("insert into bd_member(bm_id,bm_pw,bm_name,bm_adress_code,bm_adress,bm_adress_detail,bm_reg_time, bm_login_time)
    values('".$userid."','".$userpw."','".$username."','".$adress_code."','".$adress."','".$adress_detail."','".$reg_time."','".$login_time."')");
?>

<meta charset="utf-8"/>
<script>alert("회원가입완료")</script>
<meta http-equiv="refresh" content="0 url=/">
  <?php } ?>