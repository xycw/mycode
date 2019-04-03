<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/1/11
 * Time: 下午3:49
 */

function table($tableName,$rows,$cols){
    echo "<table align='center' border='1' width='600'>";
    echo "<caption><h1>$tableName</h1></caption>";
    for($out =0;$out<$rows;$out++){
        $bgcolor = $out%2 ==0?"#FFFFF" :"#DDDDD";
        echo "<tr bgcolor= ".$bgcolor.">";
        for($in = 0;$in<$cols;$in++){
            echo "<td>".($out*$cols+$in)."</td>";
        }
        echo "</td>";
    }
    echo "</table>";
}
//"&"引用传递
function example(&$m){
    $m = $m * 5 +10;
    echo "函数内\$m = ".$m;
}
$m = 1;
example($m);
echo "<br>函数外\$m = ".$m;
function values($price,$tax =0){
    $price = $price+($price*$tax);
    echo "<br>价格为:$price";
}
values(100,0.25);
values(100);

$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 0,

    'qc' => array('url' => 'http://wx.jd61.com/index.php/Home/Api/ChannelCheckIdfa', 'type' => 'G'),
    'qc_params' => array(
        'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '190'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

    'click' => array('url' => 'http://wx.jd61.com/index.php/Home/Api/channel_click', 'type' => 'G'),
    'click_params' => array(
        'need_src' => array('name' => 'cuid', 'type' => '1', 'value' => '36'),
        'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '190'),
        'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '02:00:00:00:00:00'),
        'need_udid' => array('name' => 'udid', 'type' => '1', 'value' => ''),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_ip' => array('name' => 'ip', 'type' => '2'),
        'need_callback' => array('name' => 'callback', 'type' => '1', 'value' => ''),
        'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => 'adid{need_appid}callbackcuid{need_src}idfa{need_idfa}ip{need_ip}mac{need_mac}udid{need_udid}', 'key' => '000B5E5ADE7242CB9D0BCF1921AF', 'func' => 'Join_BaseApiModel::md5Sign'),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),);
echo json_encode($data);

