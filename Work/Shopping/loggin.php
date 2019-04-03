
<?php
/**
 * 用户登录页
 *
 */
include_once './lib/fun.php';

header("content-type:text/html;charset=utf-8");
//  开启session
session_start();
//  如果用户名不为空，并且传入了用户名则跳转
if(isset($_SESSION['username'])&&!empty($_SESSION['username'])){
    $_SESSION['username'] = $result;
    header('Location:index.php');
    exit;
}
//  如果用户名不为空
//echo 'test';
if(!empty($_POST['username'])) {
//  引入文件
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!$username) {
        msg(2, '用户名不能为空');
    }
    if (!$password) {
        msg(2, '用户密码不能为空');
    }
//        链接数据库
    $con = mysqlInit('127.0.0.1', 'root', '123456', 'mytable');
    if (!$con) {
        echo mysqli_error($con) . 'ERROR<br>';
        exit;
    }
//     根据用户名查询用户
    $sql = "select * from `myshopping_user` where username = '{$username}' LIMIT 1";
//    执行sql
    $obj = mysqli_query($con, $sql);
    $result = mysqli_fetch_assoc($obj);
//    var_dump($result);
//    如果传入的是数组,并且有值

    if (is_array($result) && !empty($result)) {
//    注册密码与数据库密码匹配
        if (createPassword($password) === $result['password']) {
            $_SESSION['username'] = $result;
            header('Location:publish.php');
            exit;
        } else {
            echo 'test';
            msg(2,'Password error');
        }
    } else {
        msg(2,'Username not null');
        print_r($sql);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>M-GALLARY|用户登录</title>
    <link type="text/css" rel="stylesheet" href="./static/css/common.css">
    <link type="text/css" rel="stylesheet" href="./static/css/add.css">
    <link rel="stylesheet" type="text/css" href="./static/css/login.css">
</head>
<body>
<div class="header">

    <div class="logo f1">
        <img src="./static/image/logo.png">
    </div>
    <div class="auth fr">
        <ul>
            <li><a href="loggin.php">登录</a></li>
            <li><a href="register.php">注册</a></li>
        </ul>
    </div>
</div>
<div class="content">
    <div class="center">
        <div class="center-login">
            <div class="login-banner">
                <a href="#"><img src="./static/image/login_banner.png" alt=""></a>
            </div>
            <div class="user-login">
                <div class="user-box">
                    <div class="user-title">
                        <p>用户登录</p>
                    </div>
                    <form class="login-table" name="register" id="register-form" action="loggin.php" method="post">
                        <div class="login-left">
                            <label class="username">用户名</label>
                            <input type="text" class="yhmiput" name="username" placeholder="输入账号..." id="username">
                        </div>
                        <div class="login-right">
                            <label class="passwd">密码</label>
                            <input type="password" class="yhmiput" name="password" placeholder="输入密码..." id="password">
                        </div>
                        <div class="login-btn">
                            <button type="submit">登录</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer">
    <p><span>M-GALLARY</span> ©2018 CHENGWANG</p>
</div>

</body>
<script src="./static/js/jquery-1.10.2.min.js"></script>
<script src="./static/js/layer/layer.js"></script>
<script>
    $(function () {
        $('#register-form').submit(function () {
            var username = $('#username').val(),
                password = $('#password').val(),
                repassword = $('#repassword').val();
            if (username == '' || username.length <= 0) {
                layer.tips('用户名不能为空', '#username', {time: 2000, tips: 2});
                $('#username').focus();
                return false;
            }
            if (password == '' || password.length <= 0) {
                layer.tips('密码不能为空', '#password', {time: 2000, tips: 2});
                $('#password').focus();
                return false;
            }
            if (repassword == '' || repassword.length <= 0 || (password != repassword)) {
                layer.tips('两次密码输入不一致', '#repassword', {time: 2000, tips: 2});
                $('#repassword').focus();
                return false;
            }
            return true;
        })

    })
</script>
</html>


