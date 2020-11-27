<?php
/*
*  페이징 작동과 꾸미기
*  pgw
*  2020-11-27
*  주석추가
*/
    $pre = $page-1; // 이전페이지로 가게하는 변수
    echo " <ul class='pagination'>
    <li class='page-item'>
      <a class='page-link' href='?page=$pre' aria-label='Previous'>
        <span aria-hidden='true'>&laquo;</span>
      </a>
    </li>";         // 현재페이지 -1
    for($i=$block_start; $i<=$block_end; $i++){ // 블록시작번호가 마지막블록보다 작거나 같을 때까지 i 반복
    if($page == $i){     //만약 page가 $i와 같다면 
      echo "<li class='page-item active'>
              <a class='page-link'>$i</a>
            </li>";     //현재 페이지에 해당하는 번호 강조
    } else {
      echo "<li class='page-item'>
              <a class='page-link' href='?page=$i'>$i</a>
            </li>";     //아니라면 $i
    }}
    $next = $page + 1;  // 다음페이지로 가게하는 변수
    echo "<li class='page-item'>
            <a class='page-link' href='?page=$next' aria-label='Next'>
              <span aria-hidden='true'>&raquo;</span>
            </a>
          </li>";      // 현재페이지 + 1
?>