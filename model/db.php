<?php
/*
* 데이터베이스와 연결
*/

    //mysql과의 연결 db주소 = localhost, db아이디 = pgw, db비밀번호 = aa123456, db이름 = stu_pgw
    $db = new mysqli("localhost", "pgw", "aa123456", "stu_pgw");
    
    function mq($sql){
        global $db;
        return $db ->query($sql);
    }
?>