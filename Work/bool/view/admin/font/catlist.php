<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/1/29
 * Time: 上午10:57
 */
//include_once ('../catlist.html');
$conn = new mysqli('127.0.0.1','root','123456','blog');
mysqli_query($conn,'set names utf8');
if($conn->connect_errno){
    dei("error".$conn->connect_errno);
}
$selectsql = "select * from cat";
$rs = mysqli_query($conn,$selectsql);
$cat = array();
while ($row = mysqli_fetch_assoc($rs)){
    $cat[] = $row;
}
print_r($cat);
var_dump($cat);


