<?php
include('../conn.php');
include('./lib/alert.php');

// 接收数据
$id = $_GET['id'];

// 验证数据有效性
if(!is_numeric($id)){
    alert('ID 值不是一个数字', './news_list.php');exit;
}

// 构造 SQL 语句将 ID 作为删除的条件实现删除功能
$sql = "delete from news where id=$id";
$result = mysqli_query($conn, $sql);

// 将实行结果显示出来
if($result){
    alert('删除成功', './news_list.php');
} else {
    echo "删除失败！";
    echo mysqli_error($conn);
}

?>