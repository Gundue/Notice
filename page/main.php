<?php include "../db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_SESSION['userid'])){
            echo "<h2>{$_SESSION['userid']} 님 환영합니다. </h2>";
    ?>
    <a href="/login/logout.php"><input type="button" value="로그아웃"></a>
    <?php
        } else {
            echo "<script>alert('잘못된접근입니다'); history.back();</script>";
        }
    ?>
</body>
</html>