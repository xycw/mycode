<?php
require "pdo_config.php";
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/4/9
 * Time: 上午10:34
 */
try{
    $id = $_GET['id'];
    $name = $_GET['name'];
    $pdo = startpdo();
    $sql = "select * from test01 where id=? and name=?";
    $stm = $pdo->prepare($sql);//预处理
    $stm->execute(array($id,$name));
    if($stm->rowCount()>0){
        echo json_encode(array("errorcode"=>200,'data'=>array(
            "message"=>'登录成功'
        )));
    }
    else{
        echo json_encode(array("errorcode"=>400,'data'=>array(
            "message"=>'参数错误'
        )),true);
    }

}catch (PDOException $e){
    echo $e->getMessage();
}


