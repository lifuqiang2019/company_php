<?php
include('../conn.php');
include('./lib/alert.php');

// 接收数据
$id = $_POST['id'];
$boardname = $_POST['boardname'];
$content = $_POST['content'];

// 检验数据有效性
if(strlen($boardname)<1) {
    alert('请输入单页模块名', 'page_edit.php?id='.$id);exit;
}

// 构造 SQL 语句，将数据写入数据表，实现单页内容的更新
$sql = "update board set boardname='$boardname',content='$content' where id='$id'";
$result = mysqli_query($conn, $sql);

// 将执行结果显示出来
if($result) {
    alert('修改成功！', 'page_edit.php?id='.$id);
} else {
    alert('修改失败！', 'page_edit.php?id='.$id);
}

?>