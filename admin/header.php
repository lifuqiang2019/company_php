<?php
include('./lib/alert.php');
session_start();
if(!isset($_SESSION['id'])) {
    alert('请登录以后在操作', './login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="./assets/jquery-3.4.1.min.js"></script>
    <title>后台管理系统</title>
</head>
<body>
    <header>
        <h1>网站后台管理系统</h1>
        <p>
            <a href="./index.php"><span class="icon home"></span>系统首页</a>
            <a href="./loginout.php"><span class="icon quit"></span>安全退出</a>
        </p>
    </header>
    <section>
        <nav>
            <h3>欢迎您来到管理后台</h3>
            <p>登录名：<strong><?php echo $_SESSION['username']?></strong><br/>身  份：<strong><?php echo $_SESSION['flag']?></strong></p>
            <dl>
                <dt><span class="icon board"></span>单页管理</dt>
                <dd>
                    <a href="./page_new.php">-&emsp;新增单页</a>
                    <a href="./page_list.php">-&emsp;单页列表</a>
                </dd>
            </dl>
            <dl>
                <dt><span class="icon board"></span>新闻管理</dt>
                <dd>
                    <a href="./news_new.php">-&emsp;发布新闻</a>
                    <a href="./news_list.php">-&emsp;新闻列表</a>
                    <a href="#">-&emsp;新闻分类</a>
                </dd>
            </dl>
            <dl>
                <dt><span class="icon board"></span>产品管理</dt>
                <dd>
                    <a href="#">-&emsp;新增产品</a>
                    <a href="#">-&emsp;产品列表</a>
                    <a href="#">-&emsp;产品分类</a>
                </dd>
            </dl>
            <dl>
                <dt><span class="icon board"></span>留言管理</dt>
                <dd>
                    <a href="#">-&emsp;留言列表</a>
                </dd>
            </dl>
            <dl>
                <dt><span class="icon board"></span>友情链接管理</dt>
                <dd>
                    <a href="#">-&emsp;新增链接</a>
                    <a href="#">-&emsp;链接列表</a>
                </dd>
            </dl>
            <dl>
                <dt><span class="icon board"></span>管理员管理</dt>
                <dd>
                    <a href="#">-&emsp;新增管理员</a>
                    <a href="#">-&emsp;管理员列表</a>
                </dd>
            </dl>
        </nav>
    
