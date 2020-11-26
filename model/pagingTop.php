<?php
/*
* 페이징 처리
*/
        if(isset($_GET['page'])){ // page에 값이 있으면
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        
        $category = $_GET['catgo'];     // 검색한 카테고리
        $search_con = $_GET['search'];  // 검색한 내용
        $str = substr($category, 3, 5);
        

        $query = mq("select * from bd_board"); // 게시물을 불러옴
        $row_num = mysqli_num_rows($query);    // 게시물 총 개수
        $list = 10;                            // 한페이지에 보여줄 개수
        $block_ct = 10;                        // 블록당 보여줄 페이지 개수

        $block_num = ceil($page/$block_ct);               // 현재 페이지
        $block_start = (($block_num -1) * $block_ct) + 1; // 블록 시작번호
        $block_end = $block_start + $block_ct - 1;        // 블록 마지막 번호

        $total_page = ceil($row_num / $list);                   // 페이징한 페이지 수
        if($block_end > $total_page) $block_end = $total_page;  // 마지막 번호가 페이지 수
        $total_block = ceil($total_page/$block_ct);             // 블럭의 총 개수
        $start_num = ($page-1) * $list;

        if(isset($_GET['catgo'])) {  // 검색한 값이 있는 경우 검색 결과를 보여줌
            $sql = mq("select * FROM bd_board as board inner join bd_member as member on board.bm_idx = member.bm_idx where $category like '%$search_con%' order by bb_idx desc limit $start_num, $list");
        } else {                     // 검색한 값이 없으면 메인페이지를 보여줌
            $sql = mq("select * FROM bd_board as board inner join bd_member as member on board.bm_idx = member.bm_idx order by bb_idx desc limit $start_num, $list");
        }
?>
