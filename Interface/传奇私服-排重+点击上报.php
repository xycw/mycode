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
    'qc' => array('url' => 'http://data.zttx.net/ztuniq/api.php', 'type' => 'G'),
    'qc_params' => array(
        'need_appid' =>array('name' => 'appid','type' =>'1','value' => '1441288914'),
        'need_ip' =>array('name' => 'ip','type' =>'2'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

    'click' => array('url' => 'http://data.zttx.net/clk/clk.php', 'type' => 'G'),
    'click_params' => array(
        'need_appid' =>array('name' => 'appid','type' =>'1','value' => '1441288914'),
        'need_source' => array('name' => 'mid','type' =>'1','value' => '20066'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_time' =>array('name' => 'clktime', 'type' => '2'),
        'need_ip' =>array('name' => 'clkip', 'type' => '2'),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 1, 'fail' => 0),

    'active' => array('url' => 'http://data.zttx.net/actreport/api.php', 'type' => 'G'),
    'active_params' => array(
        'need_appid' =>array('name' => 'appid','type' =>'1','value' => '1441288914'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 1, 'fail' => 0),
);
echo json_encode($data);
