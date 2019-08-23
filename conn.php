<?php
header('Content-type: text/html;charset=utf-8');

$conn = mysqli_connect('localhost','root','111111','company') or die('数据库链接失败!');
mysqli_query($conn, 'set names utf8');
?>