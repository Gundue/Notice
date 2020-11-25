<?php
include "../model/db.php";
	if($_POST['userid'] != NULL){
	$id_check = mq("select * from bd_member where bm_id='{$_POST['userid']}'");
	$id_check = mysqli_fetch_array($id_check);
	
	if($id_check >= 1){
		echo "증복된 아이디입니다.";
	} else {
		echo "<font color=green>사용 가능한 아이디입니다.";
	}
} ?>