<?php
header('content-type:text/html;charset=utf-8');
if(isset($_REQUEST['authcode'])){
    session_start();
    echo $_POST['authcode'];
    if(strtolower($_REQUEST['authcode'])==$_SESSION['authcode']){
        echo '<font color="#0000CC">输入正确</font>';
    }else{
        echo $_POST['authcode'];
        echo '<font color="#CC0000"> <b>输入错误</b> </font>';
    }
    exit();
}