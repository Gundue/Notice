<?php
/*
*  회원가입 승인
*  pgw
*  2020-11-26
*  주석 추가
*/
    include "../model/db.php";

    global $db; // db.php의 db변수

    $userid =  mysqli_real_escape_string ($db, $_POST['userid']);    // sql Injection 방어
    $userpw = mysqli_real_escape_string ($db, $_POST['userpw']);
    $userpw2 = mysqli_real_escape_string ($db, $_POST['userpw2']);
    $encrypted_password = password_hash($userpw2, PASSWORD_DEFAULT); // password 해쉬
    $username = mysqli_real_escape_string ($db, $_POST['name']);
    $adress_code = $_POST['adress_code'];
    $adress = $_POST['adress'];
    $adress_detail = $_POST['adress_detail'];
    $reg_time = date("Y-m-d", strtotime("now"));
    $login_time = date("Y-m-d h:i:s", strtotime("now"));

    $id_check = mq("select * from bd_member where bm_id='$userid'"); // 입력받은값으로 db의 userid값을 찾음
    $id_check = mysqli_fetch_array($id_check);
    
    if($id_check >= 1){       //아이디 증복시
      echo "<script>alert('아이디가 증복됩니다.'); history.back(); </script>";
    } else if($userid == null && $userid == "") { 
      echo "<script>alert('아이디를 입력해주세요'); history.back();</script>";
    } else if($userpw != $userpw2){ //비밀번호 불일치시
      echo "<script>alert('비밀번호가 일치하지 않습니다'); history.back(); </script>";
    } else if($userpw == null && $userpw == "") {
      echo '<script>alert("비밀번호를 입력해주세요"); history.back();</script>';
    } else if($userpw2 == null && $userpw2 == "") {
      echo '<script>alert("비밀번호를 재입력해주세요"); history.back();</script>'; 
    } else if($username == null && $username == ""){
      echo '<script>alert("이름을 입력해주세요"); history.back();</script>';
    } else {
    // 멤버 정보 삽입
    $sql = mq("insert into bd_member(bm_id,bm_pw,bm_name,bm_adress_code,bm_adress,bm_adress_detail,bm_reg_time, bm_login_time)
    values('".$userid."','".$encrypted_password."','".$username."','".$adress_code."','".$adress."','".$adress_detail."','".$reg_time."','".$login_time."')");
  }
?>
<!-- <script>alert("회원가입완료")</script>
<meta http-equiv="refresh" content="0 url=/view/login.php"> -->