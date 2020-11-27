<?php 
/*
*  게시글 수정 페이지
*  pgw
*  2020-11-27
*  주석 추가
*/
include "../model/session.php"; // session managiment
include "../model/db.php";      // db connection

$bno = $_GET['idx'];                                       // 게시물의 idx값
$sql = mq("select * from bd_board where bb_idx='$bno';");  // idx값에 해당하는 글을 찾음
$board = $sql->fetch_array();
require_once('../lib/head.php');
?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<!-- navigation -->
  <?php require_once('../lib/navigation.php');?>
  <form action="../controller/modify_ok.php?idx=<?php echo $bno;?>" method="post" enctype="multipart/form-data">
    <div class="container" style="margin-Top: 50px">
        <div class="row">
            <table class="table table-striped" style="text-align:center; border: 1px solid #dddddd">
                <!-- table head-->
                <thead>        
                        <tr>
                            <th colspan="3" style="background-color: #aaaaaa; text-align:center; width : 960px">게시판 글 수정</th>
                        </tr>
                </thead>    
                <tbody>
                        <!-- writer -->             
                        <tr>
                            <td style = "width : 20%;"><b>작성자</b></td>
                            <td colspan="2"><input type="hidden" name="name" value="<?=$_SESSION['userid']?>"><?=$_SESSION['userid']?></td>
                        </tr>
                        <!-- title -->
                        <tr>
                            <td>제목</td>
                            <td ><input type="text" class="form-control" placeholder="글 제목" name="title" maxlength="50" value="<?php echo $board['bb_title']; ?>" required></td>
                        </tr>
                        <!-- content -->
                        <tr>
                            <td>내용</td>
                            <td><textarea name="content" placeholder="글 내용" class="form-control" maxlength="2048" style="height : 350px;" required><?php echo $board['bb_content']; ?></textarea></td>
                        </tr>
                        <!-- file -->
                        <tr>
                            <td>첨부파일</td>
                            <td><div id="in_file">
                            <input type="file" value="1" name="file">
                            </div><?php echo $board['bb_file']; ?></td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">글 수정</button>
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</form>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="../js/bootstrap.js"></script>
<?php require_once('../lib/tail.php') //Html tail?>