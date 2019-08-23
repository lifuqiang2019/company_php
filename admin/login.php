<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>企业门户后台登录界面</title>
    <style>
    html,body {
        margin: 0;
        padding: 0;
        background: #26272b;
    }
    form {
        width: 500px;
        height: 350px;
        margin: 100px auto 0;
        background:  #f1f2f9;
        text-align: center;
        border-radius: 8px;
    }
    form h3 {
        margin:0 0 50px 0;
        height: 50px;
        font: 24px/50px 微软雅黑;
        background: #dfe0e7;
        border-bottom: 1px solid #26272b;
        border-radius: 8px 8px 0 0;
    }
    .input {font: 16px/32px 微软雅黑; width:250px;}
    .btn {font: 18px/36px 微软雅黑; width: 160px; border: 0; background: #30ae3c; border-radius:4px; color: #fff;}
    </style>
</head>
<body>
    <form action="checkLogin.php" method="post">
        <h3>后台登录</h3>
        <p>用户名：<input type="text" name="username" class="input"/></p>
        <p>密&emsp;码：<input type="text" name="password" class="input"/></p>
        <p><input type="submit" value="立即登录" class="btn"/></p>
    </form>
</body>
</html>