<?php
include "./model/db.php";
require_once('./lib/head.php');
?>
	  <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <style>
  img {
      border-radius: 50%;
      margin: 20px;
      width: 400px;
      height : 400px;
    }
  </style>
</head>
<body>
<!-- navigation -->
<?php 
  if(isset($_SESSION['userid'])) {          //userid값이 있으면 로그아웃 버튼 navbar
    require_once('./lib/Inavigation.php');
    } else {                                //userid값이 없다면 로그인,회원가입 버튼 navbar
    require_once('./lib/Nnavigation.php');
   } 
?>

<!-- jumbotron -->
<div class="container" style="margin-Top : 50px;">
		<div class="jumbotron">
			<div class="container">
				<h1 style="font-size : 100px">게시판</h1>
				<p>여러분의 옷과 패션을 마음껏 자랑해보세요!!</p>
				<a class="btn btn-primary btn-pull" href="./view/main.php" role="button">자세히 알아보기</a>
        <?php 
        //userid값이 없으면 로그인하러가기 버튼을 보여줌
        if(!isset($_SESSION['userid'])) { 
        ?>
        <a class="btn btn-primary btn-pull" href="./view/login.php" role="button">로그인 하러가기</a>
        <?php } ?>
			</div>
		</div>
	</div>
  <div class="d-flex justify-content-between">
  <img src="./images/slideImage.jpg" alt="Avatar">
  <img src="./images/slideImage.jpg" alt="Avatar">
  <img src="./images/slideImage.jpg" alt="Avatar">
  </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
<?php require_once('./lib/tail.php'); ?>