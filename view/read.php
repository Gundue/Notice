<?php
    include "../model/db.php";
    include "../model/welcom.php";
?>
<?php require_once('../lib/head.php') ?>
    <title>게시판</title>
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
    <?php
		$bno = $_GET['idx'];
		$sql = mq("select * FROM bd_board as board inner join bd_member as member on board.bm_idx = member.bm_idx where bb_idx='".$bno."'"); /* 받아온 idx값을 선택 */
        $board = $sql->fetch_array();
            ?>
    <div class="container" style="margin-Top : 50px;">
    <div class="row">
    <table class="table table-striped" style="text-align:center; border: 1px solid #dddddd">
            <thead>        
			    <tr>
                <th colspan="3" style="background-color: #aaaaaa; text-align:center;">게시판 글 보기</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style = "width : 20%;">글 제목</td>
                    <td colspan="2"><?php echo $board['bb_title'];?></td>
                </tr>
                <tr>
                    <td>작성자</td>
                    <td colspan="2"><?php echo $board['bm_id']; ?></td>
                </tr>
                <tr>
                    <td>작성일자</td>
                    <td colspan="2"><?php echo $board['bb_reg_time'];?></td>
                </tr>
                <tr>
                    <td>수정일자</td>
                    <td colspan="2"><?php echo $board['bb_modify_time'];?></td>
                </tr>
                <tr>
                    <td>내용</td>
                    <td colspan="2" style="height: 200px; text-align: left;"><?php echo $board['bb_content']; ?></td>
                </tr>
                <tr>
                    <td>첨부파일</td>
                    <td colspan="2"><a href="../file/<?php echo $board['bb_file'];?>" download><?php echo $board['bb_file']; ?></a></td>
                </tr>
        <div>
        </div>
        </tbody>
        <?php
          if($_SESSION['idx'] == $board['bm_idx']) {
        ?>
        <input type="hidden" value="<?php $bno ?>">
        <a href="modify.php?idx=<?php echo $board['bb_idx']; ?>" class="btn btn-warning" style="margin: 5px">수정</a>
        <a href="../controller/delete.php?idx=<?php echo $board['bb_idx']; ?>" class="btn btn-danger" style="margin: 5px">삭제</a>
        <?php } ?>
    <a href="main.php" role="button" class="btn btn-primary" style="margin: 5px">목록</a>
    </table>
    <div class="replay_view">
        <h3>댓글목록</h3>
        <?php
            $sql2 = mq("select * from bd_comments as comments inner join bd_member as member on comments.bm_idx = member.bm_idx where bb_idx='".$bno."' order by bc_reg_time desc");
            while($reply = $sql2 -> fetch_array()) {
                ?>
            <table class="table table-striped table-dark">
            <tr>
                <td width="150"><b><?php echo $reply['bm_id']; ?></b><br>
                <?php echo $reply['bc_reg_time'];?>
            </td>
            </tr>
            <tr>
                <td width="550"><?php echo $reply['bc_content']; ?></td>
            </tr>
            <?php
                if($_SESSION['idx'] == $reply['bm_idx']) {
            ?>
            <tr>
                <td width="100">
                <form action="../controller/reply_delete.php" method="post">
                <input type="hidden" name="rno" value="<?php echo $reply['bc_content'] ?>">
                <input type="submit" value="삭제"></form>
            </td>
            </tr>
            </table>
            <?php } ?>
            <?php } ?>
            <div>
                <form action="../controller/reply_ok.php?idx=<?php echo $bno; ?>" method="post">
                    <textarea name="bc_content" id="re_content" cols="30" rows="3" placeholder="댓글을 입력하세요"></textarea>
                    <button type="submit" class="btn btn-primary">댓글</button>
            </form>
            </div>
            </div>
            </div>
            </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="../js/bootstrap.js"></script>
<?php require_once('../lib/tail.php') ?>