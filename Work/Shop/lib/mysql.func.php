<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2018/12/13
 * Time: 上午9:49
 */
require_once "../configs/configs.php";
function connect(){
    mysqli_connect(HOST,USER,PASS,DBNAME)or die("链接失败".mysqli_error());
}