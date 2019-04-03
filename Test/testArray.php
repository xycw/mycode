<?php
echo '<pre>';
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2018/12/17
 * Time: 下午1:51
 */
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 0,
    'qc' => array('url' => 'http://47.104.237.113:8002/api/idfa_query', 'type' => 'P'),
    'qc_params' => array(
        'need_appid' =>array('name' => 'appid','type' =>'1','value' => '1371947419'),
        'need_source' => array('name' => 'source','type' =>'1','value' => 'xiaoyuzhuanqian'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),
    'click' => array('url' => 'http://47.104.237.113:8002/api/idfa_notify', 'type' => 'P'),
    'click_params' => array(
        'need_appid' =>array('name' => 'appid','type' =>'1','value' => '1371947419'),
        'need_source' => array('name' => 'source','type' =>'1','value' => 'xiaoyuzhuanqian'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip' =>array('name' => 'ip', 'type' => '2'),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 1, 'fail' => 0),
    'active' => array('url' => 'http://47.104.237.113:8002/api/idfa_submit', 'type' => 'P'),
    'active_params' => array(
        'need_appid' =>array('name' => 'appid','type' =>'1','value' => '1371947419'),
        'need_source' => array('name' => 'source','type' =>'1','value' => 'xiaoyuzhuanqian'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip' =>array('name' => 'ip', 'type' => '2'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 1, 'fail' => 0),
);
print_r(array_keys($data));
print_r(array_rand($data));
print_r(array_sum($data));
echo '</pre>';