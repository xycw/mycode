<?php
/*    以下均未进行注入过滤，自行修改    */
$uname = $_GET['uname']; //操作
$upass = $_GET['upass']; //认证key
if($uname == 'test'&& $upass == 123){
    echo    json_encode(array('error'=>0,'message'=>'Ok')); //输出JSON
} //继续其他操作
elseif (!$uname||!$upass){
    echo json_encode(array('error'=>400,'message'=>'账户密码不能为空'));
}




?>