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
</head>
<body>
    <?php
		$bno = $_GET['idx'];
		$sql = mq("select * from bd_board where bb_idx='".$bno."'"); /* 받아온 idx값을 선택 */
		$board = $sql->fetch_array();
	?>
    <div id="board_read">
        <a href="/page/main.php"><button>뒤로가기</button></a>
        <h2><?php echo $board['bb_title'];?></h2>
    <div id="bo_content">
        <?php echo $board['bb_content']; ?>
    </div>
    </div>
    <div class="replay_view">
        <h3>댓글목록</h3>
        <?php
            $sql2 = mq("select * from bd_comments where ")
        ?>
    </div>
</body>
</html>