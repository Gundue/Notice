<?php	
	include "../model/db.php";

	global $db;
	$userid = mysqli_real_escape_string ($db, $_POST['userid']);
	$date = date("Y-m-d h:i:s", strtotime("now"));

	if($_POST["userid"] == "" || $_POST["userpw"] == "") {

		echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';

	} else {
		$password = $_POST['userpw'];
		$sql = mq("select * from bd_member where bm_id='".$_POST['userid']."'");
		$member = $sql -> fetch_array();
		$hash_pw = $member['bm_pw'];

		if(password_verify($password, $hash_pw)) {

		$_SESSION['userid'] = $member["bm_id"];
		$_SESSION['userpw'] = $member["pw"];
		$_SESSION['idx'] = $member["bm_idx"];

		if(isset($_POST['test'])) {
            setcookie('cookieID', $userid, time()+604800, "/");
		}

		echo "<script>alert('로그인되었습니다.'); location.href='../view/main.php';</script>";
		$sql2 = mq("update bd_member set bm_login_time = '$date' where bm_id = '$userid';");
	}else{ 
		echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
		}
}
?>
