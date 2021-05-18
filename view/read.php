<?php
/*
*  게시글 보기
*  pgw
*  2021-05-14
*  history.back -> $_SERVER['HTTP_REFERER']로 수정
*/

include "../model/session.php"; // session management
include_once "../model/db.php";      // db connection
require_once('../lib/head.php'); // Html header 
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <!-- navigation -->
    <?php
        require_once('../lib/navigation.php');
        $bno = $_GET['idx']; // 게시물의 idx 값
        $sql = mq("select * FROM bd_board as board inner join bd_member as member 
        on board.bm_idx = member.bm_idx where bb_idx='".$bno."'"); // board테이블과 member 테이블을 join해 게시물을 찾음
        $board = $sql->fetch_array();
    ?>
    <!-- container -->
    <div class="container" style="margin-Top : 50px;">
        <!-- Post table -->
        <div class="row">
            <table class="table table-striped" style="text-align:center; border: 1px solid #dddddd">
                <thead>
                    <tr>
                        <th colspan="8" style="background-color: #aaaaaa; text-align:center;">게시판 글 보기</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- title -->
                    <tr>
                        <td style="width : 20%; ">글 제목</td>
                        <td colspan="8" style="text-align: left;"><?php echo $board['bb_title'];?></td>
                    </tr>
                    <tr> 
                        <!-- writer -->
                        <td>작성자</td>
                        <td colspan="2"><?php echo $board['bm_id']; ?></td>
                        <!-- Date written -->
                        <td>작성일자</td>
                        <td colspan="2"><?php echo $board['bb_reg_time'];?></td>
                        <!-- Modified date -->
                        <td>수정일자</td>
                        <?php
                          if(!empty($board['bb_modify_time'])) { // 게시물을 수정한 경우
                        ?>
                        <td colspan="2"><?php echo $board['bb_modify_time'];?></td>
                        <?php 
                          } else {                              // 게시물을 수정하지 않은 경우
                        ?>
                        <td colspan="2"><?php echo "수정하지 않음";?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                        <td>내용</td>
                        <td colspan="8" style="height: 300px; text-align: left;">
                        <?php echo $board['bb_content']; echo "<br>";?>
                        <img src="../file/<?php echo $board['bb_file']?>" alt=""></td>
                    </tr>
                    <tr>
                        <?php 
                          if(!empty($board['bb_file'])){  // 첨부파일이 있는경우
                        ?>
                        <td>첨부파일</td>
                        <td colspan="8"><a href="../file/<?php echo $board['bb_file'];?>" download>
                        <?php echo $board['bb_file']; ?></a></td>
                        <? 
                          } else {                        // 첨부파일이 없는경우 
                        ?>
                        <td>첨부파일</td>
                        <td colspan="8"><?php echo "첨부파일 없음"; ?></td>
                        <?php } ?>
                    </tr>
                    <div> <!-- /.row -->
                </tbody>
                <?php
                  if($_SESSION['idx'] == $board['bm_idx']) { // 게시물 작성자가 본인이면 수정삭제 버튼 공개
                ?>
                <input type="hidden" value="<?php $bno ?>">
                <a href="modify.php?idx=<?php echo $board['bb_idx']; ?>" class="btn btn-warning" style="margin: 5px">수정</a>
                <a href="../controller/delete.php?idx=<?php echo $board['bb_idx']; ?>" class="btn btn-danger" style="margin: 5px">삭제</a>
                <?php 
                  }
                    //이전페이지 history.back은 그냥 뒤로가기 버튼 HTTP_REFERER은 이전페이지를 저장했다가 호출
                    $prevPage = $_SERVER['HTTP_REFERER'];
                    $sub = substr($prevPage, 56, 4);
                    echo $sub;
                ?>
                <!-- <a onclick="location.href='main.php?catgo=<?=$category?>&search=<?=$search?>'" role="button" class="btn btn-primary" style="margin: 5px">목록</a> -->
                <a onclick="location.href='<?=$prevPage?>'" role="button" class="btn btn-primary" style="margin: 5px">목록</a>
            </table>
            <!-- replay_table -->
            <div class="replay_view">
                <h3>댓글목록</h3>
                <form action="../controller/reply_ok.php?idx=<?php echo $bno; ?>" method="post">
                    <textarea name="bc_content" id="re_content" cols="150" rows="3" placeholder="댓글을 입력하세요"></textarea>
                    <button type="submit" class="btn btn-primary">작성</button>
                </form>
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col" width="100">작성자</th>
                            <th scope="col" width="150">작성날짜</th>
                            <th scope="col" width="800">내용</th>
                            <th scope="col" width="100">삭제</th>
                        </tr>
                    </thead>
                    <?php
                    $sql2 = mq("select * from bd_comments as comments inner join bd_member as member 
                    on comments.bm_idx = member.bm_idx where bb_idx='".$bno."' order by bc_reg_time desc"); // 게시물에 해당하는 댓글을 시간순으로 정렬
                    while($reply = $sql2 -> fetch_array()) {
                    ?>
                    <tbody>
                        <tr>
                            <td width="100" scope="row"><b><?php echo $reply['bm_id']; ?></b></td>
                            <td width="150"><?php echo $reply['bc_reg_time'];?></td>
                            <td width="800"><?php echo $reply['bc_content']; ?></td>
                            <td width="100" style="text-align:center;">
                            <form action="../controller/reply_delete.php?bb_idx=<?=$_GET['idx']?>&idx=<?=$reply['bc_idx']?>" method="post">
                            <input type="hidden" name="rno" value="<?php echo $reply['bc_content'] ?>">
                            <?php
                              if($_SESSION['idx'] == $reply['bm_idx']) { //댓글 작성자가 본인이면 댓글 삭제버튼 공개 
                            ?>
                                <input type="submit" value="삭제">
                            <?php } ?>
                            </form>
                            </td>
                        </tr>
                        <?php } //end while ?>
                    </tbody>
                </table>
            </div> <!-- /.replay_view -->
          </div> <!-- /.container -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="../js/bootstrap.js"></script>
    <?php require_once('../lib/tail.php') //Html tail?> 