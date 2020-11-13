<meta charset="utf-8" />
<?php	
	include "../db.php";
	include "../password.php";

	if($_POST["userid"] == "" || $_POST["userpw"] == "") {

		echo '<script> alert("아이디나 패스워드 입력하세요"); history.back(); </script>';

	} else {
		
	#$password = $_POST['userpw'];
	$sql = mq("select * from bd_member where bm_id='".$_POST['userid']."'");
    $member = mysqli_fetch_array($sql);
	#$hash_pw = $member['bm_pw'];  

	if($_POST['userpw'] == $member['bm_pw']) {

		$_SESSION['userid'] = $member["bm_id"];
		$_SESSION['idx'] = $member["bm_idx"];

		echo "<script>alert('로그인되었습니다.'); location.href='/page/main.php';</script>";
	}else{ 
		echo "<script>alert('아이디 혹은 비밀번호를 확인하세요.'); history.back();</script>";
		}
}
?>