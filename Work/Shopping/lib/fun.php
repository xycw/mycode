<?php
/**
 * 数据库链接.
 * User: niaogebiji
 * Date: 2018/10/24
 * Time: 下午4:03
 */
function mysqlInit($host,$username,$password,$dbName)
{
    $con = mysqli_connect($host, $username, $password, $dbName);
    return $con;
}
/**密码加密
 * @param $password
 * @return bool|string
 */
function createpassword($password){
    if(!$password){
        return false;
    }
    return md5(md5($password).'mytable');
}
/**
 * 消息提示
 */
function msg($type, $msg=null, $url=null)
{
    echo 'test';
    $toUrl = "Location:msg.php?type={$type}";
    echo $type.$msg;
    //当msg为空时 url不写入
    $toUrl .= $msg ? "&msg={$msg}" : '';
    //当url为空 toUrl不写入
    $toUrl .= $url ? "&url={$url}" : '';
    header($toUrl);
    //exit;
    //header("Location:msg.php?type=${type}&msg=${msg}&url=loggin.php");
}
