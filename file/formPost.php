<?
include "conn.php";

//저장할 파일 경로
$uploads_dir = './file/';

//이미지파일
$image_file = $_FILES['file'];

//확장자
$array = explode('.', $image_file['name']);
$extension = end($array);

//서버에 저장될 이름
$actual_image_name = time().'.'.$extension;

//받은 파일 이름
$tmp = $image_file['name'];

//파일업로드
move_uploaded_file($image_file['tmp_name'], $uploads_dir.$actual_image_name);

//db에 저장
$query = "insert into test values('','".$_POST['title']."','".$actual_image_name."','".$tmp."')";
$conn->query($query);

//마지막 ai
$last_id = $conn->insert_id;

//json
$res = array(
    'idx' => $last_id,
    'title' => $_POST['title'],
    'act' => $actual_image_name,
    'rel' => $tmp
);

echo json_encode($res);
?>
