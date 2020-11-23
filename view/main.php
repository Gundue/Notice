<?php
include "../model/db.php";
include "../model/welcom.php";
?>
<?php require_once('../lib/head.php') ?>
    <title>게시판</title>
    <link rel="stylesheet" href='../css/common.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
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
        <a class="nav-link" href="main.php">게시판</a>
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

    <div class="d-flex justify-content-between" style="margin-Top : 50px;">
    <div class="left" style="margin-Left : 50px; margin-top:20px;">
    <!-- <a href="https://www.netflix.com/kr/"><img src="../images/netflix.png" alt=""></a> -->
    </div>
    <div class="main_board">
    <h1>게시판</h1>
      <form method="get">
        <select name="catgo">
            <option value="bb_title">게시판 제목</option>
            <option value="bm_id">작성자</option>
            <option value="bb_content">내용</option>
        </select>
        <input type="text" name="search" size="40" require="required"><button type="submit" class="btn btn-info">검색</button>
    </form>
    <table class="table table-hover">
    <tr>
        <td width="70" >번호</td>
        <td width="500">게시판 제목</td>
        <td width="150">작성자</td>
        <td width="200">글 생성일</td>
        </tr>
    <?php
        require_once('../model/pagingTop.php');
        while($board = $sql -> fetch_array())
        {
            $title=$board["bb_title"];
            if(strlen($title)>30)
            {
                $title=str_replace($board['bb_title'],mb_substr($board["bb_title"],0,30,"utf-8")."...",$board["bb_title"]);
            }
        $sql2 = mq("select * from bd_comments where bb_idx = '".$board['bb_idx']."'");
        $rep_count = mysqli_num_rows($sql2);
        ?>
        <tbody>
            <tr>
                <td width="70" ><?php echo $board['bb_idx'];?></td>
                <td width="500"><a href="read.php?idx=<?php echo $board["bb_idx"];?>"><?php echo $title;?></a><span class="re_ct">[<?php echo $rep_count; ?>]</span></td>
                <td width="150"><?php echo $board['bm_id']?></td>
                <td width="200"><?php echo $board['bb_reg_time']?></td>
            </tr>
        </tbody>
        <?php
          }
        ?>
        </table>
    <nav aria-label="Page navigation example" style="margin-left: 300px">
        <ul class="pagination">
      <?php
            require_once('../model/pagingBottom.php')
        ?>
      </ul>
</nav>
        <div class="write_btn">
            <a href="write.php"><button type="button" class="btn btn-info">글쓰기</button></a>
        </div>
        </div>
        <div class="right" style="margin-right: 50px;">
          <!-- <a href="#"><img src="../images/herowars.png" alt=""></a> -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="../js/bootstrap.js"></script>

    <?php require_once('../lib/tail.php') ?>
