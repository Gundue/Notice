<?php
include "../db.php";
	if($_POST['userid'] != NULL){
	$id_check = mq("select * from bd_member where bm_id='{$_POST['userid']}'");
	$id_check = mysqli_fetch_array($id_check);
	
	if($id_check >= 1){
		echo "존재하는 아이디입니다.";
	} else {
		echo "존재하지 않는 아이디입니다.";
	}
} ?>