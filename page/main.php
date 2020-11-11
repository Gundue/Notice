<?php 
include "../db.php";
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
    <div id="board_area">
    <h1>게시판</h1>
    <table>
    <th>
    <tr>
        <td width="50" >번호</td>
        <td width="500">제목</td>
        <td width="100">작성자</td>
        <td width="200">날짜</td>
        <td width="50" >조회수</td>
        </tr>
    </th>
    <?php
        $sql = mq("select * from bd_board order by bb_idx desc limit 0,5");
        while($bd_board = $sql -> fetch_array())
        {
            $title=$bd_board["bb_title"];
            if(strlen($title)>30)
            {
                $title=str_replace($bd_board['bb_title'],mb_substr($bd_board["bb_title"],0,30,"utf-8")."...",$board["title"]);
            }
        ?>
        <tbody>
            <tr>
                <td width="70"><?php echo $bd_board['bb_idx'];?></td>
                <td width="500"><a href=""></a><?php echo $title?></td>
                <td width="120"><?php echo $bd_board['bb_name'];?></td>
                <td></td>
            </tr>
        </tbody>
        <?php } ?>
        </table>
        <div class="write_btn">
            <a href="/page/write.php"><button>글쓰기</button></a>
        </div>
    </div>
</body>
</html>
 

