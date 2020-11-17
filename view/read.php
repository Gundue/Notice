<?php
    include "../model/db.php";
    include "../model/welcom.php";
?>
<?php require_once('../lib/head.php') ?>
    <title>게시판</title>
</head>
<body>
    <?php
		$bno = $_GET['idx'];
		$sql = mq("select * from bd_board where bb_idx='".$bno."'"); /* 받아온 idx값을 선택 */
		$board = $sql->fetch_array();
	?>
    <div id="board_read">
    <div id="bo_ser">
		<ul>
			<li><a href="/">[목록으로]</a></li>
			<li><a href="modify.php?idx=<?php echo $board['bb_idx']; ?>">[수정]</a></li>
			<li><a href="../controller/delete.php?idx=<?php echo $board['bb_idx']; ?>">[삭제]</a></li>
		</ul>
	</div>
        <h2><?php echo $board['bb_title'];?></h2>
    <div id="bo_content">
        <?php echo $board['bb_content']; ?>
    </div>
    d
    </div>
    <div class="replay_view">
        <h3>댓글목록</h3>
        <?php
        #select * from bd_comments as comments inner join bd_member as member on comments.bm_idx = member.bm_idx order by bc_reg_time desc
            $sql2 = mq("select * from bd_comments where bb_idx='".$bno."' order by bc_reg_time desc");
            while($reply = $sql2 -> fetch_array()) {
                ?>
            <div class="dab_lo">
                <div><b><?php echo $reply['bm_idx']; ?></b></div>
                <div><?php echo $reply['bc_content']; ?></div>
                <div><?php echo $reply['bc_reg_time'];?></div>
                <div>
                    <a href="#">삭제</a>
                </div>
            <?php } ?>
            <div>
                <form action="../controller/reply_ok.php?idx=<?php echo $bno; ?>" method="post">
                    <textarea name="bc_content" id="re_content" cols="30" rows="10"></textarea>
                    <button id="rep_bt" class="re_bt">댓글</button>
            </form>
            </div>
            </div>
    </div>
<?php require_once('../lib/tail.php') ?>