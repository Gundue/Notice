<?php
    include "../model/db.php";
?>
<?php require_once('../lib/head.php') ?>
    <title>Document</title>
    <link rel="stylesheet" href="../css/common.css">
</head>
<body>
    <div id="board_area">
        <?php
            $category = $_GET['catgo'];
            $str = substr($category, 3, 5);
            $search_con = $_GET['search'];
        ?>
        <h1><?php echo $str?>에서 찾은 '<?php echo $search_con ?>'검색결과</h1>
        <h4><a href="main.php">뒤로가기</a></h4>
        <table>
            <tb>
            <tr>
                <td width="50" >번호</td>
                <td width="500">게시판 제목</td>
                <td width="150">작성자</td>
                <td width="200">글 생성일</td>
                </tr>
            </th>
            <?php
                $sql = mq("select * FROM bd_board as board inner join bd_member as member on board.bm_idx = member.bm_idx where $category like '%$search_con%' order by bb_idx desc");
                while($board = $sql -> fetch_array())
                {
                    $title=$board["bb_title"];
                    if(strlen($title)>30)
                    {
                        $title=str_replace($board['bb_title'],mb_substr($board["bb_title"],0,30,"utf-8")."...",$board["bb_title"]);
                    }
                ?>
                <tbody>
                    <tr>
                        <td width="50"><?php echo $board['bb_idx'];?></td>
                        <td width="500"><a href="read.php?idx=<?php echo $board["bb_idx"];?>"><?php echo $title;?></a></td>
                        <td width="150"><?php echo $board['bm_id']?></td>
                        <td width="200"><?php echo $board['bb_reg_time']?></td>
                    </tr>
                </tbody>
                <?php } ?>
                </table>
    </div>
<?php require_once('../lib/tail.php') ?>