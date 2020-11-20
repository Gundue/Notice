<?php
        if(isset($_SESSION['userid'])){
            echo "<h2>{$_SESSION['userid']} 님 환영합니다. </h2>";
    ?>
    <a href="../controller/logout.php"><button type="button" class="btn btn-danger">로그아웃</button></a>
    <?php
        } 
        else {
            echo "<script>alert('잘못된접근입니다'); history.back();</script>";
        }
    ?>