<?php include "./db.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>회원가입 및 로그인</title>
  <link rel="stylesheet" herf="./css/common.css"></link>
<script src="${contextPath}/resources/js/js.cookie.js"></script>
<script>
$(document).ready(function(){
 
 // 저장된 쿠키값을 가져와서 ID 칸에 넣어준다. 없으면 공백으로 들어감.
 var key = getCookie("key");
 $("#userId").val(key); 
  
 if($("#userId").val() != ""){ // 그 전에 ID를 저장해서 처음 페이지 로딩 시, 입력 칸에 저장된 ID가 표시된 상태라면,
     $("#idSaveCheck").attr("checked", true); // ID 저장하기를 체크 상태로 두기.
 }
  
 $("#idSaveCheck").change(function(){ // 체크박스에 변화가 있다면,
     if($("#idSaveCheck").is(":checked")){ // ID 저장하기 체크했을 때,
         setCookie("key", $("#userId").val(), 7); // 7일 동안 쿠키 보관
     }else{ // ID 저장하기 체크 해제 시,
         deleteCookie("key");
     }
 });
  
 // ID 저장하기를 체크한 상태에서 ID를 입력하는 경우, 이럴 때도 쿠키 저장.
 $("#userId").keyup(function(){ // ID 입력 칸에 ID를 입력할 때,
     if($("#idSaveCheck").is(":checked")){ // ID 저장하기를 체크한 상태라면,
         setCookie("key", $("#userId").val(), 7); // 7일 동안 쿠키 보관
     }
 });
});

function setCookie(cookieName, value, exdays){
 var exdate = new Date();
 exdate.setDate(exdate.getDate() + exdays);
 var cookieValue = escape(value) + ((exdays==null) ? "" : "; expires=" + exdate.toGMTString());
 document.cookie = cookieName + "=" + cookieValue;
}

function deleteCookie(cookieName){
 var expireDate = new Date();
 expireDate.setDate(expireDate.getDate() - 1);
 document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
}

function getCookie(cookieName) {
 cookieName = cookieName + '=';
 var cookieData = document.cookie;
 var start = cookieData.indexOf(cookieName);
 var cookieValue = '';
 if(start != -1){
     start += cookieName.length;
     var end = cookieData.indexOf(';', start);
     if(end == -1)end = cookieData.length;
     cookieValue = cookieData.substring(start, end);
 }
 return unescape(cookieValue);
}
</script>
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
        <input type="checkbox" id="idSaveCheck">아이디 기억하기
        </td>
          <td>
            <a href="/member/member.php">회원가입</a>
          </td>
        </tr>
      </table>
    </form>
  </div>
</body>
</html>