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

    'qc' => array('url' => 'uat-tiku.zhan.com/CommonServer/idfa/task/check', 'type' => 'G'),
    'qc_params' => array(
        'need_appId' =>array('name'=>'appId','type'=>'1','value'=>'20180907000990'),
        'need_source' =>array('name'=>'source','type'=>'1','value'=>'xy1809070001'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_time' => array('name' => 'time', 'type' => '2'),
        'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_appId}{need_idfa}{need_source}{need_time}', 'key' => 'nhaqy438aue', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2 ,'lower' =>false),
    ),
    'qc_ret' => array('format' => 'json', 'field' => 'success', 'succ' => 0, 'fail' => 1),
    'click' => array('url' => 'uat-tiku.zhan.com/CommonServer/idfa/task/click', 'type' => 'G'),
    'click_params' => array(
        'need_appId' =>array('name'=>'appId','type'=>'1','value'=>'20180907000990'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_time' => array('name' => 'time', 'type' => '2'),
        'need_source' =>array('name'=>'source','type'=>'1','value'=>''),
        'need_cb' => array('name' => 'callback', 'type' => '1', 'value' =>'http://www.xiaoyuzhuanqian.com/'),
        'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_appId}{need_cb}{need_idfa}{need_source}{need_time}', 'key' => 'nhaqy438aue', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2,'lower' =>false),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),
    'active' => array('url' => 'uat-tiku.zhan.com/CommonServer/idfa/task/activate_query', 'type' => 'G'),
    'active_params' => array(
        'need_appId' =>array('name'=>'appId','type'=>'1','value'=>'20180907000990'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_time' => array('name' => 'time', 'type' => '2'),
        'need_source' =>array('name'=>'source','type'=>'1','value'=>''),
        'need_cb' => array('name' => 'callback', 'type' => '1', 'value' =>'http://www.xiaoyuzhuanqian.com/'),
        'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_appId}{need_cb}{need_idfa}{need_source}{need_time}', 'key' => 'nhaqy438aue', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2,'lower' =>false),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => "1", 'fail' => "0"),

);
echo json_encode($data);
