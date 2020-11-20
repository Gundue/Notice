<?php
    include "../model/db.php";
    include "../model/welcom.php";
?>
<?php require_once('../lib/head.php') ?>
    <title>게시판</title>
    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <?php
		$bno = $_GET['idx'];
		$sql = mq("select * from bd_board where bb_idx='".$bno."'"); /* 받아온 idx값을 선택 */
        $board = $sql->fetch_array();
	?>
    <div id="board_read">
    <?php
        if($_SESSION['idx'] == $board['bm_idx']) {
    ?>
    <input type="hidden" value="<?php $bno ?>">
    <a href="modify.php?idx=<?php echo $board['bb_idx']; ?>">[수정]</a>
    <a href="../controller/delete.php?idx=<?php echo $board['bb_idx']; ?>">[삭제]</a>
    <?php } ?>
    <a href="main.php" role="button">목록</a>
        <div id="user_info">
			<h2><?php echo $board['bb_title'];?></h2>
				<div id="bo_line"></div>
			</div>
			<div id="bo_content">
            <?php echo $board['bb_content']; ?>
            <?php echo $board['bm_idx']; ?>
            <?php echo $board['bb_reg_time'];?>
            <?php echo $board['bb_modify_time'];?>
			</div>
        <div>
            파일 : <a href="../file/<?php echo $board['bb_file'];?>" download><?php echo $board['bb_file']; ?></a>
        </div>
    <div class="replay_view">
        <h3>댓글목록</h3>
        <?php
        #select * from bd_comments as comments inner join bd_member as member on comments.bm_idx = member.bm_idx order by bc_reg_time desc
            $sql2 = mq("select * from bd_comments as comments inner join bd_member as member on comments.bm_idx = member.bm_idx where bb_idx='".$bno."' order by bc_reg_time desc");
            while($reply = $sql2 -> fetch_array()) {
                ?>
            <div class="dab_lo">
                <div><b><?php echo $reply['bm_id']; ?></b></div>
                <div><?php echo $reply['bc_content']; ?></div>
                <div><?php echo $reply['bc_reg_time'];?></div>
            <?php
                if($_SESSION['idx'] == $reply['bm_idx']) {
            ?>
            <form action="../controller/reply_delete.php" method="post">
                <input type="hidden" name="rno" value="<?php echo $reply['bc_content'] ?>">
                <input type="submit" value="삭제">
            </form>
            <?php } ?>
            <?php } ?>
            <div>
                <form action="../controller/reply_ok.php?idx=<?php echo $bno; ?>" method="post">
                    <textarea name="bc_content" id="re_content" cols="30" rows="3"></textarea>
                    <button type="button" class="btn btn-primary">댓글</button>
            </form>
            </div>
            </div>
            </div>
    </div>
<?php require_once('../lib/tail.php') ?>