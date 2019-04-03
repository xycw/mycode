<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/1/14
 * Time: 下午4:40
 */

echo "<pre>";
$data = array("friest"=>1,"second"=>2,"third"=>3);
echo $data["second"];
$data["third"] = 0;
echo "<br>".$data["third"];
    $name = "智能机器人@智能手机@智能语音";
    $arrayid = explode("@",$name);
    print_r($arrayid);
    $newname = "智能机器人";
    $num = 100;
    $key = array_search($newname,$arrayid);
    print_r($key);
    $arraycount[$key] = $num;
    print_r($arraycount);
    $data = array("1","2","3");
    array_push($data,"第一个","第二个");
    print_r($data);
echo "<pre>";
