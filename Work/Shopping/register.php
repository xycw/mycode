<?php
/**
 * 用户注册页
 */
include_once './lib/fun.php';
header("content-type:text/html;charset=utf-8");
//如果用户名不为空
//echo 'test';
if(!empty($_POST['username'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);

    if(!$username){
        echo '用户名不能为空';exit;
    }
    if(!$password){
        echo '密码不能为空';exit;
    }
    if(!$repassword){
        echo '确认密码不能为空';exit;
    }
    if($password!==$repassword){
        echo '两次密码输入不一致',exit;
    }
//    链接数据库
    $con = mysqlInit('127.0.0.1','root','6','mytable');
//    echo "<span style='color:red;'><h4>数据库myshopping_user-连接成功.....</h4></span><br >";
    //echo $username;
    if(!$con ) {
        echo mysqli_error($con).'ERROR<br>';
        exit;
    }
//    判断用户数据是否在数据表中
    $sql = "SELECT COUNT(  `id` ) as total FROM  `myshopping_user` WHERE  username =  '{$username}'";
    //echo $sql;
//    执行sql
    $obj = mysqli_query($con,$sql);
//  sql执行成功转换成数组
    $result = mysqli_fetch_array($obj);
    print_r($result);
//    如果传入的数据值相同 验证账号重复
    if(isset($result['total'])&&$result['total']){
        msg(2,'username exists');exit;
        mysqli_error($con);
    }
//    密码加密
    $password = createPassword($password);
//    释放变量
    unset($sql,$obj,$result);
//    插入用户数据
    $sql = "INSERT `myshopping_user`(`username`,`password`,`create_time`) values('{$username}','{$password}','{$_SERVER['REQUEST_TIME']}')";
    $obj = mysqli_query($con,$sql);
//    用户名不存在，注册成功
    if($obj){
        msg(1,'username OK!');exit;
        $userId = mysqli_insert_id($con);
    }
    else{
        msg(2,'username error!');exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>M-GALLARY|用户注册</title>
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
                        <p>用户注册</p>
                    </div>
                    <form class="login-table" name="register" id="register-form" action="register.php" method="post">
                        <div class="login-left">
                            <label class="username">用户名</label>
                            <input type="text" class="yhmiput" name="username" placeholder="输入账号..." id="username">
                        </div>
                        <div class="login-right">
                            <label class="passwd">密码</label>
                            <input type="password" class="yhmiput" name="password" placeholder="输入密码..." id="password">
                        </div>
                        <div class="login-right">
                            <label class="passwd">确认</label>
                            <input type="password" class="yhmiput" name="repassword" placeholder="确认密码..."
                                   id="repassword">
                        </div>
                        <div class="login-btn">
                            <button type="submit">注册</button>
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


