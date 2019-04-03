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
    'qc' => array('url' => 'https://mbaas.qishiyun.com.cn/app/channels/checkidfa', 'type' => 'P'),
    'qc_params' => array(
        'need_appid' =>array('name' => 'appid','type' =>'1','value' => '1437610296'),
        'need_source' =>array('name' => 'source','type' =>'1','value' => 'jr_xiaoyu'),
        'need_mac' =>array('name' => 'source','type' =>'1','value' => 'jr_xiaoyu'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1),

    /*'active' => array('url' => 'http://www.hotads.top/click/to', 'type' => 'G'),
    'active_params' => array(
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip' =>array('name' => 'ip', 'type' => '2'),
        'need_useragent' =>array('name' => 'useragent', 'type' => '1','value'=>'1'),
        'need_time' =>array('name' => 'clicktime', 'type' => '2'),
        'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3DXSJF%26id%3D'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'Code', 'succ' => 200, 'fail' => 400),*/
    'active' => array('url' => 'https://mbaas.qishiyun.com.cn/app/channels/clickad', 'type' => 'G'),
    'active_params' => array(
        'need_appid' =>array('name' => 'appid','type' =>'1','value' => '1437610296'),
        'need_source' =>array('name' => 'source','type' =>'1','value' => 'jr_xiaoyu'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Djingrui%26id%3D'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'data@{status}', 'succ' => 1, 'fail' => 0),
);
echo json_encode($data);
