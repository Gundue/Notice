<?php include "./db.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>회원가입 및 로그인</title>
  <link rel="stylesheet" herf="./css/common.css"></link>
</head>
<body>
  <div id="login_box">
    <h1>로그인</h1>
    <form action="/login/login_ok.php" method="post">
      <table>
        <tr>
          <td>
            <input type="text" name="userid">
          </td>
          <td>
            <input type="password" name="userpw">
          </td>
          <td>
            <button type="submit">로그인</button>
          </td>
        </tr>
        <tr>
          <td>
            <a href="/member/member.php">회원가입</a>
          </td>
        </tr>
      </table>
    </form>
  </div>
</body>
</html>