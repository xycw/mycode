<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2018/12/14
 * Time: 下午2:44
 */
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$verify = $_POST['verify'];
$verify1 = $_SESSION['verify'];