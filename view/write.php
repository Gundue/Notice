<?php
include "../model/db.php";
include "../model/welcom.php"; 
?>
<?php require_once('../lib/head.php') ?>
    <title>게시판</title>
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div id="write_area">
    <div class="board_write">
        <h1><a href="/view.main.php">자유게시판</a></h1>
        <h4>글 작성</h4>
            <form action="../controller/write_ok.php" method="post"  enctype="multipart/form-data">
                <table style="padding-top:50px" align = center width=700 border=0 cellpadding=2>                
                    <tr>
                    <td height=20 align= center bgcolor=#ccc><font color=white> 글쓰기</font></td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td><b>작성자</b></td>
                                    <td><input type="hidden" name="name" value="<?=$_SESSION['userid']?>"><?=$_SESSION['userid']?></td>
                                </tr>

                                <tr>
                                    <td>제목</td>
                                    <td><textarea name="title" id="utitle" cols="55" rows="1" placeholder="제목" maxlength="100" size=60 required></textarea></td>
                                </tr>
                                
                                <tr>
                                    <td>내용</td>
                                    <td><textarea name="content" id="ucontent" placeholder="내용" cols=85 rows=15 required></textarea></td>
                                </tr>
                            </table>
                            <div id="in_file">
                    <input type="file" value="1" name="file">
                </div>
                <div class="bt_se">
                    <button type="submit" class="btn btn-primary">글 작성</button>
                </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
<?php require_once('../lib/tail.php'); 