<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/5/6
 * Time: 下午1:51
 */
include 'pdo_config.php';
$id = $_GET['id'];
$name = $_GET['name'];
$phone = $_GET['phone'];
$schoolid = $_GET['schoolid'];
/*echo $id,$name,$phone,$schoolid;*/
$pdo = startpdo();
$pdo->query('set names utf8;');
$sqlcou = "select * from student where name  = '${name}'";
if($pdo->exec($sqlcou)>0){
    echo '111';
}




    /*$sqladd = "insert into student values ('{$id}','{$name}','{$phone}','{$schoolid}')";
$res = $pdo->query($sqladd);
if($res->rowCount()>0){
    echo "ok";
}
else{
    echo "false";
}*/
