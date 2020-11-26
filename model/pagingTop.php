<?php
        //page value exists
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        
        $category = $_GET['catgo'];     // Search Categories
        $search_con = $_GET['search'];  // Search Content 
        $str = substr($category, 3, 5);
        

        $query = mq("select * from bd_board"); // Recall Posts
        $row_num = mysqli_num_rows($query);    // total post
        $list = 10;                            // Number to show on one page
        $block_ct = 10;                        // Number to show per block

        $block_num = ceil($page/$block_ct);               // current page block
        $block_start = (($block_num -1) * $block_ct) + 1; // Block Start Number
        $block_end = $block_start + $block_ct - 1;        // Block Last Number

        $total_page = ceil($row_num / $list); //페이징한 페이지 수
        if($block_end > $total_page) $block_end = $total_page;
        $total_block = ceil($total_page/$block_ct); //블럭의 총 개수
        $start_num = ($page-1) * $list;

        if(isset($_GET['catgo'])) {  // 검색한 값이 있는 경우 검색 결과를 보여줌
            $sql = mq("select * FROM bd_board as board inner join bd_member as member on board.bm_idx = member.bm_idx where $category like '%$search_con%' order by bb_idx desc limit $start_num, $list");
        } else {                     // 검색한 값이 없으면 메인페이지를 보여줌
            $sql = mq("select * FROM bd_board as board inner join bd_member as member on board.bm_idx = member.bm_idx order by bb_idx desc limit $start_num, $list");
        }
?>
