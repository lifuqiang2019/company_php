<?php
include('../conn.php');
// 接收数据
$username = $_POST['username'];
$password = $_POST['password'];

// 验证数据的有效性
if(strlen($username)<1) {
    echo "用户名不能为空";exit;
}
if(strlen($password)<6) {
    echo "密码不能小于6位数";exit;
}

// 构造 SQL 语句，查询数据库，返回查到的数据。验证用户名和密码是否在数据库中存在。
$sql = "select * from admin where username='$username' and password='$password'";

// var_dump($sql);
$result = mysqli_query($conn, $sql);  // 将构造好的 SQL 语句发送往数据库去执行，将执行的结构返回到 $result 变量中， $result 叫结果集。
// if($result) {
//     echo "result 有值";
// } else {
//     echo "result 无值";
// } 
// 从结果集读取数据，返回关联数组，以数据库中的字段名作为数组的键名
if($row = mysqli_fetch_assoc($result)) {
    // 如果能从结果集中提取到数据，则表示提供的用户名和密码在数据库中存在，登录成功
    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['flag'] = $row['flag'];
    header('Location: index.php');
} else {
    // 登陆失败
    echo "登录失败，用户名或密码错误，请重试！";exit;
}
?>