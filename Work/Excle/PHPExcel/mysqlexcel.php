<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/4/2
 * Time: 下午2:41
 */
echo '<pre>';
require ('../mysqldb.php');
require ('../mysqlexcel.php');
$i = new mysqlexcel();
$sql = "select * from testcpl";
 $r = $i->getResult($sql);
 print_r($r);
 echo '</pre>';
