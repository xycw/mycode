<?php
/**
 * 商品登录页.
 * User: niaogebiji
 * Date: 2018/10/26
 * Time: 下午5:09
 */

session_start();
if(isset($_SESSION['username'])&&!empty($_SESSION['username'])){
        header('Loacation:loggin.php');
}
echo '登录成功';