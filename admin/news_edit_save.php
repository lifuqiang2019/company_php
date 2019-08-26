<?php
include('../conn.php');
include('./lib/alert.php');

// 接收数据
$id = $_POST['id'];
$title = $_POST['title'];
$cate_id = $_POST['cate_id'];
$author = $_POST['author'];
$content = $_POST['content'];
$img = $_FILES['img'];

// 检验数据有效性
if($img['name']){
    $ext = strrchr($img['name'], '.');
    $filename = time().rand(100,999).$ext;
    move_uploaded_file($img['tmp_name'], '../files/'.$filename); // 上传文件后自动写入到临时文件中，必须使用move_uploaded_file
} else {
    $filename = $_POST['old_img'];
}


// 构造 SQL 语句，将数据写入数据表，实现新闻内容的更新
$sql = "update news set title='$title',content='$content', cate_id='$cate_id', author='$author' ,img='$filename' where id='$id'";
$result = mysqli_query($conn, $sql);

// 将执行结果显示出来
if($result) {
    alert('修改成功！', 'news_edit.php?id='.$id);
} else {
    alert('修改失败！', 'news_edit.php?id='.$id);
}

?>