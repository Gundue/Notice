<?php
    $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
    echo " <ul class='pagination'>
    <li class='page-item'>
      <a class='page-link' href='?page=$pre' aria-label='Previous'>
        <span aria-hidden='true'>&laquo;</span>
      </a>
    </li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
    for($i=$block_start; $i<=$block_end; $i++){ 
    //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
    if($page == $i){ //만약 page가 $i와 같다면 
      echo "<li class='page-item active'><a class='page-link'>$i</a></li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
    }else{
      echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>"; //아니라면 $i
    }
    }
    $next = $page + 1; //next변수에 page + 1을 해준다.
    echo "<li class='page-item'>
    <a class='page-link' href='?page=$next' aria-label='Next'>
      <span aria-hidden='true'>&raquo;</span>
    </a>
    </li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
?>