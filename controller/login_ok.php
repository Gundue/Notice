<?php	
	include "../model/db.php";

	$userid = $_POST['userid'];
	$date = date("Y-m-d h:i:s", strtotime("now"));

	if($_POST["userid"] == "" || $_POST["userpw"] == "") {

		echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';

	} else {
		
	$sql = mq("select * from bd_member where bm_id='".$_POST['userid']."'");
    $member = mysqli_fetch_array($sql);

	if($_POST['userpw'] == $member['bm_pw']) {

		$_SESSION['userid'] = $member["bm_id"];
		$_SESSION['idx'] = $member["bm_idx"];

		if(isset($_POST['remember-me'])) {
            $cookieID = $id;
            setcookie('cookieID', $cookieID, time()+604800, "/");
        }

		echo "<script>alert('로그인되었습니다.'); location.href='../view/main.php';</script>";
		$sql2 = mq("update bd_member set bm_login_time = '$date' where bm_id = '$userid';");
	}else{ 
		echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
		}
}
?>