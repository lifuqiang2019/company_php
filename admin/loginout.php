<?php
include('./lib/session.php');
session_start();

$_SESSION = array();  // 将 SESSION 定义为空数组，清除所有数据
session_destroy();    // 清除 SESSION 缓存文件

alert('退出成功，欢迎下次在来！', './login.php');
?>