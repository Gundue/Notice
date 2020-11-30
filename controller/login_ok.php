<?php
/*
*  로그인 승인
*  pgw
*  2020-11-26
*  주석 추가
*/
	session_start(); 
	include "../model/db.php";

	global $db;  // db.php의 db변수

	$userid = mysqli_real_escape_string ($db, $_POST['userid']); //Sql injection 방어
	$date = date("Y-m-d h:i:s", strtotime("now"));

	if($_POST["userid"] == "" || $_POST["userpw"] == "") { 		 //id, pw 값이 없다면

		echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';

	} else {

		$password = $_POST['userpw'];
		$sql = mq("select * from bd_member where bm_id='".$_POST['userid']."'");
		$member = $sql -> fetch_array();
		$hash_pw = $member['bm_pw']; 

	if(password_verify($password, $hash_pw)) { //password값과 hashpassword의 값을 비교

	    $_SESSION['userid'] = $member["bm_id"];
	    $_SESSION['idx'] = $member["bm_idx"];
	
		if(isset($_POST['test'])) {  			   //아이디저장을 체크했다면 7일쿠키 생성
    	    setcookie('cookieID', $userid, time()+604800, "/");
		}
	
	echo "<script>alert('로그인되었습니다.'); location.href='../view/main.php';</script>";
	//최종 로그인시간 저장
	$sql2 = mq("update bd_member set bm_login_time = '$date' where bm_id = '$userid';");

	} else { 
		echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
	}
}
