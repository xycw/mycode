<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/4/2
 * Time: 下午3:02
 */

class mysqldb
{
    public $conn = null;
    public function __construct()
    {
        mysqli_connect();
    }
}