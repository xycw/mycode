<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/3/19
 * Time: 上午11:23
/* */

function mysqlInit($host,$username,$password,$dbName)
{
   return mysqli_connect($host, $username, $password, $dbName);

}

echo 'test';