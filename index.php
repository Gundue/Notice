<?php
include "./model/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" type="text/css" href="./css/common.css">

	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<style>
		img {
			width : 500px !important;
		}
	</style>
</head>
<body>
<?php 
	if(isset($_SESSION['userid'])) {
?>		
<nav class="navbar navbar-expand navbar-dark bg-dark">
  <a class="navbar-brand" href="#">게시판</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../index.php">메인</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./view/main.php">게시판</a>
	  </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">회원관리</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="../controller/logout.php">로그아웃</a>
        </div>
      </li>
	</ul>
  </div>
</nav>

	<?php } else {?>
<nav class="navbar navbar-expand navbar-dark bg-dark">
  <a class="navbar-brand" href="#">게시판</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">메인</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./view/main.php">게시판</a>
	  </li>
	  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">접속하기</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="./view/login.php">로그인</a>
          <a class="dropdown-item" href="./view/member.php">회원가입</a>
        </div>
      </li>
	</ul>
  </div>
</nav>
	<?php } ?>


<div class="container" style="margin-Top : 50px;">
		<div class="jumbotron">
			<div class="container">
				<h1 style="font-size : 100px">게시판</h1>
				<p>여러분의 옷과 패션을 보여주세요!!</p>
				<a class="btn btn-primary btn-pull" href="#" role="button">자세히 알아보기</a>
			</div>
		</div>
	</div>
	<!-- 메인 페이지 이미지 삽입 영역 -->
	<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
		  <div class="carousel-item active" data-interval="10000">
			<img src="../images/slideImage.jpg" class="d-block w-100" width="500px" height="400px" alt="...">
		  </div>
		  <div class="carousel-item" data-interval="2000">
			<img src="../images/slideImage.jpg" class="d-block w-100" height="400px" alt="...">
		  </div>
		  <div class="carousel-item">
			<img src="../images/slideImage.jpg" class="d-block w-100" height="400px" alt="...">
		  </div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
		  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		  <span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
		  <span class="carousel-control-next-icon" aria-hidden="true"></span>
		  <span class="sr-only">Next</span>
		</a>
	  </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>