<?php 
session_start();
include "../welcom.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/common.css">
</head>
<body>
    <?php 
        $connect = mysqli_connect("localhost", "pgw", "aa123456", "stu_pgw") or die ("connect fail");
        $sql = "select * from bd_board order by bb_idx desc";
        $result = $connect -> query($sql);
        $total = mysqli_num_rows($result);
    ?>
    <h2>게시판</h2>
    <table>
    <th>
    <tr>
        <td width="50" >번호</td>
        <td width="500">제목</td>
        <td width="100">작성자</td>
        <td width="200">날짜</td>
        <td width="50" >조회수</td>
        </tr>
    </th>
    <tbody>
        <?php
        while($rows = mysqli_fetch_assoc($result)){
            if($total%2==0) {
        ?> <tr class="even">
        <?php
            } else {
        ?> </tr>
        <?php } ?>
            <td width = "50"><?php echo $total?></td>
            <td width = "500">
            <a href = "view.php?number=<?php echo $rows['number']?>">
            <?php echo $rows['bb_title']?></td>
            <td width = "100"><?php echo $rows['bm_idx']?></td>
            <td width = "200"><?php echo $rows['date']?></td>
            <td width = "50"><?php echo $rows['hit']?></td>
            </tr>
        <?php
                $total--;
                }
        ?>
        </tbody>
        </table>
        <div class = text>
        <font style="cursor: hand"onClick="location.href='./write.php'">글쓰기</font>
        </div>
</body>
</html>
 

