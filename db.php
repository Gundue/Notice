<?php
    //새로운 세션 시작 
    session_start();

    //mysql과의 연결 db주소 = localhost, db아이디 = pgw, db비밀번호 = aa123456, db이름 = stu_pgw
    $db = new mysqli("localhost", "pgw", "aa123456", "stu_pgw");
    
    function mq($sql){
        //global을 통해서 외부에서 선언된 db변수를 함수안에서 사용
        global $db;
        return $db ->query($sql);
    }
?>