
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 0,
    'qc' => array('url' => 'uat-tiku.zhan.com/CommonServer/idfa/task/check', 'type' => 'G','header'=>'Accept:application/json'),
    'qc_params' => array(
        'need_source' =>array('name'=>'source','type'=>'1','value'=>'xy1809070001'),
        'need_appid' => array('name' => 'appId', 'type' => '1', 'value' => '20180907000990'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_time' => array('name' => 'time', 'type' => '2'),
        'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => 'appId={need_appid}&idfa={need_idfa}&source={need_source}&time={need_time}&key=', 'key' => 'nhaqy438aue', 'func' => 'Join_BaseApiModel::md5Sign','pos' => 2,'lower'=>false,),
    ),
    'qc_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),

    'click' => array('url' => 'uat-tiku.zhan.com/CommonServer/idfa/task/click', 'type' => 'G','header'=>'Accept:application/json'),
    'click_params' => array(
        'need_source' =>array('name'=>'source','type'=>'1','value'=>'xy1809070001'),
        'need_appid' => array('name' => 'appId', 'type' => '1', 'value' => '20180907000990'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_time' => array('name' => 'time', 'type' => '2'),
        'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => 'appId={need_appid}&idfa={need_idfa}&source={need_source}&time={need_time}&key=', 'key' => 'nhaqy438aue', 'func' => 'Join_BaseApiModel::md5Sign','pos' => 2,'lower'=>false,),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),

    'active' => array('url' => 'uat-tiku.zhan.com/CommonServer/idfa/task/activate', 'type' => 'G','header'=>'Accept:application/json'),
    'active_params' => array(
        'need_source' =>array('name'=>'source','type'=>'1','value'=>'xy1809070001'),
        'need_appid' => array('name' => 'appId', 'type' => '1', 'value' => '20180907000990'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_time' => array('name' => 'time', 'type' => '2'),
        'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => 'appId={need_appid}&idfa={need_idfa}&source={need_source}&time={need_time}&key=', 'key' => 'nhaqy438aue', 'func' => 'Join_BaseApiModel::md5Sign','pos' => 2,'lower'=>false,),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),
);
echo json_encode($data);
