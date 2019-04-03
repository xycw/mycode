<?php
//调用接口文件
require_once('./test01.php');//引入文件

$arr=array(
    'id' =>1,
    'name'=>'niao'
);

Response::json(200,'数据返回成功',$arr);
?>