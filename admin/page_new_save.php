<?php
include('../conn.php');
include('./lib/alert.php');

// 接收数据
$boardname = $_POST['boardname'];
$content = $_POST['content'];

// 验证数据有效性
if(strlen($boardname)<1){
    alert('请输入单页模块名', 'page_new.php');exit;
}

// 构造 SQL 语句，将数据写入数据表，实现新增单页的功能
$sql = "insert into board(boardname,content) values ('$boardname', '$content')";
$result = mysqli_query($conn, $sql);

// 显示执行结果
if($result) {
    alert('新增成功！', './page_list.php');
} else {
    alert('新增失败！', './page_new.php');
}
?>