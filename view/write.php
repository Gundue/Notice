<?php
/*
* 글작성 페이지
*/
include "../model/session.php";  // session managiment
include "../model/db.php";       // db connection
require_once('../lib/head.php'); // Html header
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <!-- navigation -->
<?php 
    require_once('../lib/navigation.php'); 
?>
    <form action="../controller/write_ok.php" method="post" enctype="multipart/form-data">
        <!-- container -->
        <div class="container" style="margin-Top : 50px">
            <div class="row">
                <table class="table table-striped" style="text-align:center; border: 1px solid #dddddd">
                    <thead>
                        <tr>
                            <th colspan="3" style="background-color: #aaaaaa; text-align:center;">게시판 글쓰기</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- writer -->
                        <tr>
                            <td><b>작성자</b></td>
                            <td colspan="2"><input type="hidden" name="name"
                                    value="<?=$_SESSION['userid']?>"><?=$_SESSION['userid']?></td>
                        </tr>
                        <!-- title -->
                        <tr>
                            <td>제목</td>
                            <td colspan="2"><input type="text" class="form-control" placeholder="글 제목" name="title"
                                    maxlength="50" required></td>
                        </tr>
                        <!-- content -->
                        <tr>
                            <td>내용</td>
                            <td colspan="2"><textarea name="content" placeholder="글 내용" class="form-control"
                                    maxlength="2048" style="height : 350px;" required></textarea></td>
                        </tr>
                        <!-- file -->
                        <tr>
                            <td>첨부파일</td>
                            <td colspan="2">
                                <div id="in_file">
                                    <input type="file" value="1" name="file">
                                </div> 
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">글 작성</button>
            </div> <!-- /.row -->
        </div> <!-- /. container-->
    </form>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
<?php require_once('../lib/tail.php'); ?>