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

    'qc' => array('url' => 'http://api.check.adzshd.com/RemoveEcho.ashx', 'type' => 'G'),
    'qc_params' => array(
        'need_adid' =>array('name'=>'adid','type'=>'1','value'=>'3090'),
        'need_appid' =>array('name'=>'appid','type'=>'1','value'=>'3090'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip' =>array('name'=>'ip','type'=>'2'),
        'need_os' => array('name' => 'system_version', 'type' => '2'),
        'need_osversion' =>array('name'=>'osversion','type'=>'2'),
        'need_btype' => array('name' => 'btype', 'type' => '1','value'=>'1'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => "0", 'fail' => "1"),

    'click' => array('url' => 'http://api.adzshd.com/SourceClick.ashx', 'type' => 'G'),
    'click_params' => array(
        'need_adid' =>array('name'=>'adid','type'=>'1','value'=>'3090'),
        'need_appid' =>array('name'=>'appid','type'=>'1','value'=>'3090'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip' =>array('name'=>'ip','type'=>'2'),
        'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '02:00:00:00:00:00'),
        'need_os' => array('name' => 'system_version', 'type' => '2'),
        'need_osversion' =>array('name'=>'osversion','type'=>'2'),
        'need_keyword' => array('name' => 'keyword', 'type' => '2'),
        //'need_cb'=>array('name'=>'callback','type'=>'2'),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),

);
echo json_encode($data);
