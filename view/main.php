<?php
/*
*  게시판 메인 페이지
*  pgw
*  2020-11-26
*  들여쓰기 주석 추가
*/

include "../model/session.php";  //session managiment
include "../model/db.php";       // db connection 
require_once('../lib/head.php'); // Html header
?>
  <link rel="stylesheet" href='../css/common.css'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <!-- navigation -->
    <?php 
      require_once('../lib/navigation.php'); 
    ?>
    <!-- container -->
    <div class="d-flex justify-content-between" style="margin-Top : 50px;">

    <!-- left advertisement -->
    <div class="left" style="margin-Left : 50px; margin-top:50px;">
      <a href="https://www.netflix.com/kr/"><img src="../images/netflix.png" alt=""></a>
    </div>
    <!-- Search -->
    <div class="main_board">
    <h1>게시판</h1>
      <form method="get">
        <select name="catgo">
            <option value="bb_title">게시판 제목</option>
            <option value="bm_id">작성자</option>
            <option value="bb_content">내용</option>
        </select>
        <input type="text" name="search" size="40" value="<?php echo $_GET['search'] ?>" require="required"><button type="submit" class="btn btn-info">검색</button>
    </form>
    <!-- Board Table -->
    <table class="table table-hover">
    <tr>
        <td width="70" >번호</td>
        <td width="500">게시판 제목</td>
        <td width="150">작성자</td>
        <td width="200">글 생성일</td>
        </tr>
    <!-- paging -->
    <?php 
        require_once('../model/pagingTop.php');
        while($board = $sql -> fetch_array())
        {
        $sql2 = mq("select * from bd_comments where bb_idx = '".$board['bb_idx']."'"); //댓글 카운트
        $rep_count = mysqli_num_rows($sql2);
        ?>
        <tbody>
            <tr>
                <td width="70" ><?php echo $board['bb_idx'];?></td>
                <td width="500"><a href="read.php?idx=<?php echo $board["bb_idx"];?>"><?php echo $board['bb_title'];?></a><span class="re_ct">
                <?php 
                //게시글의 댓글이 있다면 댓글개수 보여줌
                  if(!empty($rep_count)) {
                      echo "[".$rep_count."]";
                    } 
                ?>
                <?php if(!empty($board['bb_file'])) {  //게시글의 이미지가 있으면 이미지가 있다고 알려줌
                echo '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-image" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9c0 .013 0 .027.002.04V12l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094L15 9.499V3.5a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm4.502 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/></svg>';} ?></span></td>
                <td width="150"><?php echo $board['bm_id']?></td>
                <td width="200"><?php echo $board['bb_reg_time']?></td>
            </tr>
        </tbody>
        <?php
          }  // end of while
        ?>
        </table>
    <!-- paging design -->
    <nav aria-label="Page navigation example" style="margin-left: 300px">
        <ul class="pagination">
          <?php
            require_once('../model/pagingBottom.php');
          ?>
      </ul>
      <div class="write_btn" style="margin-left: 50px;">
            <a href="write.php"><button type="button" class="btn btn-info">글쓰기</button></a>
      </div>
    </nav>
        </div> <!-- /.main_board -->
      <!-- left advertisement -->
        <div class="right" style="margin-right: 50px;">
          <a href="#"><img src="../images/herowars.png" alt=""></a>
        </div> <!-- right -->
    </div> <!-- container -->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="../js/bootstrap.js"></script>
<?php require_once('../lib/tail.php') //Html tail?>
