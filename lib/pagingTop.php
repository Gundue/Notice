<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];
} else {
    $page = 1;
}
$query = mq("select * from bd_board");
$row_num = mysqli_num_rows($query); //게시판의 총 레코드
$list = 5; //한 페이지에 보여줄 개수
$block_ct = 5; //블록당 보여줄 페이지 개수

$block_num = ceil($page/$block_ct); //현재 페이지 블록
$block_start = (($block_num -1) * $block_ct) + 1; //블록의 시작번호
$block_end = $block_start + $block_ct - 1; //블록 마지막 번호

$total_page = ceil($row_num / $list); //페이징한 페이지 수
if($block_end > $total_page) $block_end = $total_page;
$total_block = ceil($total_page/$block_ct); //블럭의 총 개수
$start_num = ($page-1) * $list;
?>