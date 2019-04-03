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

    'qc' => array('url' => 'http://iapi.128xy.com/api/yuverify.php', 'type' => 'G'),
    'qc_params' => array(
        'need_appid' =>array('name'=>'appid','type'=>'1','value'=>'1334532307'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_source' =>array('name'=>'source','type'=>'1','value'=>'xiaoyu'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => "0", 'fail' => "1"),

    'click' => array('url' => 'http://iapi.128xy.com/api/yuclick.php', 'type' => 'G'),
    'click_params' => array(
        'need_appid' =>array('name'=>'appid','type'=>'1','value'=>'1334532307'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_source' =>array('name'=>'source','type'=>'1','value'=>'xiaoyu'),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    'active' => array('url' => 'http://iapi.128xy.com/api/yuatcidfa.php', 'type' => 'G'),
    'active_params' => array(
        'need_appid' =>array('name'=>'appid','type'=>'1','value'=>'1334532307'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_source' =>array('name'=>'source','type'=>'1','value'=>'xiaoyu'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
);

echo json_encode($data);
