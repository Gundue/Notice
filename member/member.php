<?php include "../db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>회원가입</title>
</head>
<body>
    <form action="post" action="member_ok.php">
        <h1>회원가입</h1>
        <fieldset>
                <table>
                    <tr>
                        <td>아이디</td>
                        <td><input type="text" size="20" name="userid" placeholder="아이디"></td>
                    </tr>
                    <tr>
                        <td>비밀번호</td>
                        <td><input type="password" size="20" name="userpw" placeholder="비밀번호"></td>
                    </tr>
                    <tr>
                        <td>비밀번호 확인</td>
                        <td><input type="password" size="20" name="userpw2" placeholder="비밀번호 확인"></td>
                    </tr>
                    <tr>
                        <td>이름</td>
                        <td><input type="text" size="10" name="name" placeholder="이름"></td>
                    </tr>
                    <tr>
                        <td>우편번호,주소,상세주소</td>
                        <td><input type="text" size="35" name="adress" placeholder="주소"></td>
                    </tr>
                </table>
                <input type="submit" vlaue="가입하기">
        </fieldset>
    </form>
</body>
</html>