<?php include "../db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>회원가입</title>
    <script>
        function checkid(){
	var userid = document.getElementById("uid").value;
	if(userid)
	{
		url = "check.php?userid="+userid;
			window.open(url,"chkid","width=300,height=100");
		}else{
			alert("아이디를 입력하세요");
		}
	}
    </script>
</head>
<body>
    <form method="post" action="member_ok.php">
        <h1>회원가입</h1>
        <fieldset>
                <table>
                    <tr>
                        <td>아이디</td>
                        <td><input type="text" size="35" name="userid" id="uid" placeholder="아이디" required>
								<input type="button" value="중복검사" onclick="checkid();" />
								<input type="hidden" value="0" name="chs" />
                    </td>
                    </tr>
                    <tr>
                        <td>비밀번호</td>
                        <td><input type="password" size="20" name="userpw" placeholder="비밀번호"></td>
                    </tr>
                    <!-- <tr>
                        <td>비밀번호 확인</td>
                        <td><input type="password" size="20" name="userpw2" placeholder="비밀번호 확인"></td>
                    </tr> -->
                    <tr>
                        <td>이름</td>
                        <td><input type="text" size="10" name="name" placeholder="이름"></td>
                    </tr>
                    <tr>
                        <td>우편번호</td>
                        <td><input type="text" size="35" name="adress_code" placeholder="우편번호"></td>
                    </tr>
                    <tr>
                        <td>주소</td>
                        <td><input type="text" size="35" name="adress" placeholder="주소"></td>
                    </tr>
                    <tr>
                        <td>상세주소</td>
                        <td><input type="text" size="35" name="adress_detail" placeholder="상세주소"></td>
                    </tr>
                </table>
                <input type="submit" vlaue="가입하기">
        </fieldset>
    </form>
</body>
</html>