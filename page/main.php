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
        <td width="500">게시판 제목</td>
        <td width="150">게시판 작성자</td>
        <td width="200">글 생성일</td>
        </tr>
    </th>
    <?php
        $sql = mq("select * from bd_board order by bb_idx desc limit 0,5");
        while($board = $sql -> fetch_array())
        {
            $title=$board["bb_title"];
            if(strlen($title)>30)
            {
                $title=str_replace($board['bb_title'],mb_substr($board["bb_title"],0,30,"utf-8")."...",$board["bb_title"]);
            }
        ?>
        <?php
                $query = mq("select * FROM bd_board as board inner join bd_member as member on board.bm_idx = member.bm_idx");
                $qq = $query -> fetch_array();
                ?>
        <tbody>
            <tr>
                <td width="50"><?php echo $board['bb_idx'];?></td>
                <td width="500"><a href="/page/read.php?idx=<?php echo $board["bb_idx"];?>"><?php echo $title;?></a></td>
                <td width="150"><?php echo $qq['bm_id']?></td>
                <td width="200"><?php echo $board['bb_reg_time']?></td>
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
 

