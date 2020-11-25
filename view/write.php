<?php
include "../model/db.php";
include "../model/welcom.php"; 
?>
<?php require_once('../lib/head.php') ?>
<title>게시판</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">게시판</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02"
            aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
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
            </ul>
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    회원관리
                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <button class="dropdown-item" type="button"
                        onclick="location.href='../controller/logout.php'">로그아웃</button>
                </div>
            </div>
        </div>
    </nav>
    <form action="../controller/write_ok.php" method="post" enctype="multipart/form-data">
        <div class="container" style="margin-Top : 50px">
            <div class="row">
                <table class="table table-striped" style="text-align:center; border: 1px solid #dddddd">
                    <thead>
                        <tr>
                            <th colspan="3" style="background-color: #aaaaaa; text-align:center;">게시판 글쓰기</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>작성자</b></td>
                            <td colspan="2"><input type="hidden" name="name"
                                    value="<?=$_SESSION['userid']?>"><?=$_SESSION['userid']?></td>
                        </tr>
                        <tr>
                            <td>제목</td>
                            <td colspan="2"><input type="text" class="form-control" placeholder="글 제목" name="title"
                                    maxlength="50" required></td>
                        </tr>
                        <tr>
                            <td>내용</td>
                            <td colspan="2"><textarea name="content" placeholder="글 내용" class="form-control"
                                    maxlength="2048" style="height : 350px;" required></textarea></td>
                        </tr>
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
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
<?php require_once('../lib/tail.php'); 