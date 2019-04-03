<?php
//定义类
class Response{
//静态方法
//$code 状态码
//$message 提示信息
//$data数据
//return string
    public static function json($code,$message="",$data=array()){
        if(!is_numeric($code)){
            return "";
        }

        $result=array(
            'code'=>$code,
            'message'=>$message,
            'data'=>$data
        );

        echo json_encode($result);
    }
}

?>
