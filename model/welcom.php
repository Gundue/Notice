<?php
/*
* 세션검사
*/
        if(isset($_SESSION['userid'])){
    ?>
    <?php
        } 
        else {
            echo "<script>alert('잘못된접근입니다');location.href='../view/login.php';</script>";
        }
    ?>