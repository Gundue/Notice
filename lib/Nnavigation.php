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