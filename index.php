<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title>test</title>
</head>
<body>
 
<?php
echo "MySql 연결 테스트<br>";
 
$db = mysqli_connect("localhost", "pgw", "aa123456", "stu_pgw");

if($db){
    echo "connect : 성공<br>";
}
else{
    echo "disconnect : 실패<br>";
}
 
$result = mysqli_query($db, 'SELECT VERSION() as VERSION');
$data = mysqli_fetch_assoc($result);
echo $data['VERSION'];
?>
 
</body>
</html>