
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 1,
    'qc' => array('url' => 'https://api-toolbox-healthcare.qschou.com/api/system/device/checkdup','type'=>'G'),
    'qc_params' => array(
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
        'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1100539967'),


    ),
    'qc_ret' => array('format' => 'json', 'field' => 'data@{need_idfa}', 'succ' => 0, 'fail' => 1),
    /*
        'click' => array('url' => 'uat-tiku.zhan.com/CommonServer/idfa/task/click', 'type' => 'G','header'=>'Accept:application/json'),
        'click_params' => array(
            'need_source' =>array('name'=>'source','type'=>'1','value'=>'xy1809070001'),
            'need_appid' => array('name' => 'appId', 'type' => '1', 'value' => '20180907000990'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_time' => array('name' => 'time', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => 'appId={need_appid}&idfa={need_idfa}&source={need_source}&time={need_time}&key=', 'key' => 'nhaqy438aue', 'func' => 'Join_BaseApiModel::md5Sign','pos' => 2,'lower'=>false,),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),*/

    'active' => array('url' => 'https://api-toolbox-healthcare.qschou.com/api/system/device/addpromoinfo','type'=>'P'),
    'active_params' => array(
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
        'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1100539967'),
        'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3DQSC%26id%3D')
    ),
    'active_ret' => array('format' => 'json', 'field' => 'data@status', 'succ' => 1, 'fail' => 0),
);

echo json_encode($data);
