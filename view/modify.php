<?php 
    include "../model/db.php";

    $bno = $_GET['idx'];
    $sql = mq("select * from bd_board where bb_idx='$bno';");
    $board = $sql->fetch_array();
    require_once('../lib/head.php');
?>

    <title>Document</title>
</head>
<body>
    <div id="board_write">
        <form action="../controller/modify_ok.php?idx=<?php echo $bno;?>" method="post">
                    <div id="in_title">
                        <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $board['bb_title']; ?></textarea>
                    </div>
                    <div class="wi_line"></div>
                    <div id="in_content">
                        <textarea name="content" id="ucontent" placeholder="내용" required><?php echo $board['bb_content']; ?></textarea>
                    </div>
                    <div class="bt_se">
                        <button type="submit">글 작성</button>
                    </div>
        </form>
    </div>
</body>
</html>