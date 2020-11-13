<?php include "../db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>회원가입</title>
    <script src="https://t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="../js/common.js"></script>
</head>
<body>
    <form method="post" action="member_ok.php">
        <h1>회원가입</h1>
        <fieldset>
                <table>
                    <tr>
                        <td>아이디</td>
                        <td><input type="text" size="35" name="userid" id="userid" class="check" placeholder="아이디"  required />
                        <td><div id="id_check">아이디 증복 검사</div></td>
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
                        <td>우편번호</td>
                        <td><input type="text" id="sample6_postcode" placeholder="우편번호" name="adress_code"></td>
                        <td><input type="button" onclick="sample6_execDaumPostcode()" value="우편번호 찾기"></td>
                    </tr>
                    <tr>
                        <td>주소</td>
                        <td><input type="text" id="sample6_address" placeholder="주소" name="adress"></td>
                    </tr>
                    <tr>
                        <td>상세주소</td>
                        <td><input type="text" id="sample6_detailAddress" placeholder="상세주소" name="adress_detail"></td>
                    </tr>
                    <tr>
                        <td>참고항목</td>
                        <td><input type="text" id="sample6_extraAddress" placeholder="참고항목"></td>
                    </tr>
                </table>
                <input type="submit" vlaue="가입하기">
        </fieldset>
    </form>
</body>
</html>
