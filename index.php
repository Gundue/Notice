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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<?php 
	if(isset($_SESSION['userid'])) {
?>		
<nav class="navbar navbar-expand navbar-dark bg-dark">
  <a class="navbar-brand" href="../index.php">게시판</a>
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
	</ul>
  <div class="btn-group">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    회원관리
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <button class="dropdown-item" type="button" onclick="location.href='../controller/logout.php'">로그아웃</button>
  </div>
</div>
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
	</ul>
  <div class="btn-group">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    접속하기
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <button class="dropdown-item" type="button" onclick="location.href='./view/login.php'">로그인</button>
    <button class="dropdown-item" type="button" onclick="location.href='./view/member.php'">회원가입</button>
  </div>
</div>
  </div>
</nav>
	<?php } ?>


<div class="container" style="margin-Top : 50px;">
		<div class="jumbotron">
			<div class="container">
				<h1 style="font-size : 100px">게시판</h1>
				<p>여러분의 옷과 패션을 마음껏 자랑해보세요!!</p>
				<a class="btn btn-primary btn-pull" href="./view/main.php" role="button">자세히 알아보기</a>
        <?php if(!isset($_SESSION['userid'])) { ?>
        <a class="btn btn-primary btn-pull" href="./view/login.php" role="button">로그인 하러가기</a>
        <?php } ?>
			</div>
		</div>
	</div>
	<!-- 메인 페이지 이미지 삽입 영역 -->
  <img src="./images/slideImage.jpg" alt="..." class="img-rounded">
  <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/slideImage.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./images/slideImage.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./images/slideImage.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
</body>
</html>