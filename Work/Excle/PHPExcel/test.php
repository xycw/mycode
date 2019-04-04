<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/4/3
 * Time: 下午1:43
 */

require ("./mysqlexcel.php");
$mysql = new mysqlexcel();
$sql = "select * from testcpl";
$mysql->getResult($sql);
