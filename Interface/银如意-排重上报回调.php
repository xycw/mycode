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
    'model' => 1,

    'qc' => array('url' => 'http://device.qh5800.com/api/1/yu/judge/idfa', 'type' => 'G'),
    'qc_params' => array(
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_appid'=>array('name'=>'appid','type'=>'1','value'=>'com.yskj.hzfinance'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),


    'active' => array('url' => 'http://device.qh5800.com/api/1/yu/save/data', 'type' => 'P'),
    'active_params' => array(
        'need_source' => array('name' => 'source','type' =>'1','value' => 'xyzq'),
        'need_appid'=>array('name'=>'appid','type'=>'1','value'=>'com.yskj.hzfinance'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_callback' => array('name' => 'callbackurl', 'type' => '3','value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dyingruyi%26id%3D'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
        'need_mdl'=>array('name'=>'deviceInfo','type'=>'2'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
);

echo json_encode($data);
