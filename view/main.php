<?php 
include "../model/db.php";
include "../model/welcom.php";
?>
<?php require_once('../lib/head.php') ?>
    <title>게시판</title>
    <link rel="stylesheet" href="../css/common.css">
</head>
<body>
    <div id="board_area">
    <h1>게시판</h1>
    <div id="search_box">
      <form action="search_result.php" method="get">
        <select name="catgo">
            <option value="bb_title">게시판 제목</option>
            <option value="bm_idx">작성자</option>
            <option value="bb_content">내용</option>
        </select>
        <input type="text" name="search" size="40" require="required"><button>검색</button>
    </form>
    </div>
    <table class="list-table">
    <th>
    <tr>
        <td width="50" >번호</td>
        <td width="500">게시판 제목</td>
        <td width="150">작성자</td>
        <td width="200">글 생성일</td>
        </tr>
    </th>
    <?php
        require_once('../model/pagingTop.php');
        while($board = $sql -> fetch_array())
        {
            $title=$board["bb_title"];
            if(strlen($title)>30)
            {
                $title=str_replace($board['bb_title'],mb_substr($board["bb_title"],0,30,"utf-8")."...",$board["bb_title"]);
            }
        $sql2 = mq("select * from bd_comments where bb_idx = '".$board['bb_idx']."'");
        $rep_count = mysqli_num_rows($sql2);
        ?>
        <tbody>
            <tr>
                <td width="50"><?php echo $board['bb_idx'];?></td>
                <td width="500"><a href="read.php?idx=<?php echo $board["bb_idx"];?>"><?php echo $title;?></a><span class="re_ct">[<?php echo $rep_count; ?>]</span></td>
                <td width="150"><?php echo $board['bm_id']?></td>
                <td width="200"><?php echo $board['bb_reg_time']?></td>
            </tr>
        </tbody>
        <?php
          }
        ?>
        </table>
        <div id="page_num">
      <ul>
        <?php
          require_once('../model/pagingBottom.php')
        ?>
      </ul>
    </div>
        <div class="write_btn">
            <a href="write.php"><button>글쓰기</button></a>
        </div>
    </div>
    <?php require_once('../lib/tail.php') ?>
 

