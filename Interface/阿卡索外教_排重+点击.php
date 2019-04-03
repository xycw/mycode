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

    'qc' => array('url' => 'http://api.acadsoc.com.cn/applink/xiaoyu.ashx', 'type' => 'G'),
    'qc_params' => array(
        'need_method'=>array('name'=>'method','type'=>'1','value'=>'clicknotice'),
        'need_appid'=>array('name'=>'appid','type'=>'1','value'=>'0'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_source'=>array('name'=>'source','type'=>'1','value'=>'0'),
        'need_callback'=>array('name'=>'callback','type'=>'2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => 'status', 'succ' => "1", 'fail' => "0"),

    'active' => array('url' => 'http://api.acadsoc.com.cn/applink/xiaoyu.ashx', 'type' => 'G'),
    'active_params' => array(
        'need_method'=>array('name'=>'method','type'=>'1','value'=>'removerepeat'),
        'need_appid'=>array('name'=>'appid','type'=>'1','value'=>'0'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_source'=>array('name'=>'source','type'=>'1','value'=>'0'),
    ),
    'active_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => "0", 'fail' => "1"),

);

echo json_encode($data);
