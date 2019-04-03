<?php
/**
接收数据
 *  require_once|加载文件一次
 */
require_once "oPerService.class.php";

if(isset($_REQUEST['num1'])){

    $num1 = $_REQUEST['num1'];
}
if(isset($_REQUEST['num2'])){

    $num2 = $_REQUEST['num2'];
}
$oper = $_REQUEST['oper'];

$result = new oPerService();
$sum = $result->getResult($num1,$num2,$oper);
echo '$num1'.$oper.'$num2'.'结果为:'.$sum;






