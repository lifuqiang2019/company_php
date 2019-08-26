<?php
include('../conn.php');
include('./lib/alert.php');

// 接收数据
$title = $_POST['title'];
$content = $_POST['content'];
$cate_id = $_POST['cate_id'];
$author = $_POST['author'];
$img = $_FILES['img'];


// 验证数据有效性
// if(strlen($boardname)<1){
//     alert('请输入单页模块名', 'page_new.php');exit;
// }
if($img['name']){
    $ext = strrchr($img['name'], '.'); // 截取最后一个. 以及后面的内容赋值给 $ext, 得到文件扩展名
    $filename = time().rand(100,999).$ext;
    move_uploaded_file($img['tmp_name'], '../files/'.$filename); // 上传文件后自动写入到临时文件中，必须使用 move_uploaded_file
} else {
    $filename = '';
}

// 构造 SQL 语句，将数据写入数据表，实现发布新闻的功能
$sql = "insert into news(title, content, cate_id, author, img) values ('$title', '$content', $cate_id, '$author', '$filename')";
$result = mysqli_query($conn, $sql);

// 显示执行结果
if($result) {
    alert('发表成功！', './news_list.php');
} else {
    alert('发表失败！', './news_new.php');
}
?>