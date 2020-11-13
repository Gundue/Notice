<?php
session_start();
include "../welcom.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <link rel="stylesheet" href="../css/common.css">
</head>
<body>
    <div class="board_write">
        <h1><a href="/">자유게시판</a></h1>
        <h4>글 작성</h4>
        <div id="write_area">
            <form action="write_ok.php" method="post">
                <div id="in_title">
                    <textarea name="title" id="utitle" cols="55" rows="1" placeholder="제목" maxlength="100" required></textarea>
                </div>
                <div class="wi_line"></div>
                <div id="in_content">
                <textarea name="content" id="ucontent" placeholder="내용" required></textarea>
                </div>
                <div id="in_file">
                    <input type="file" value="1" name="b_file">
                </div>
                <div class="bt_se">
                    <button type="submit">글작성</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>