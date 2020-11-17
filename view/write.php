<?php
include "../model/db.php";
include "../model/welcom.php"; 
?>
<?php require_once('../lib/head.php') ?>
    <title>게시판</title>
    <link rel="stylesheet" href="../css/common.css">
</head>
<body>
    <div class="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <h4>글 작성</h4>
        <div id="write_area">
            <form action="../controller/write_ok.php" method="post">
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
                    <input type="file" value="1" name="b_file">
                </div>
                <div class="bt_se">
                    <button type="submit">글작성</button>
                </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
<?php require_once('../lib/tail.php'); 