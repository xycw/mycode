<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2018/9/2
 * Time: 上午10:26
 */

header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 0,

    'click' => array('url' => 'http://data.zttx.net/clk/clk.php', 'type' => 'G'),
    'click_params' => array(
        'need_appid' =>array('name' => 'appid','type' =>'1','value' =>'1404898578'),
        'need_mid'=>array('name'=>'mid','type'=>'1','value'=>'20066'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        //'need_idfamd5' =>array('name' => 'idfamd5', 'type' => '2',),
        'need_time'=>array('name'=>'clktime','type'=>'2'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 200, 'fail' => 400),

);

echo json_encode($data);
