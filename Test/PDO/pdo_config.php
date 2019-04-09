<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/4/9
 * Time: 下午18:08
 */
 function startpdo(){
    header('content-type:text/html;charset=utf8');
//连接数据库
    $dsn="mysql:dbname=mytable;host=127.0.0.1";
//数据库的用户名
    $user="root";
//数据库的密码
    $password="123456";
//生成PDO对象
    $object = new PDO($dsn,$user,$password);
    return $object;
}
?>