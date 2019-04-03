
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 1,
    'qc' => array('url' => 'http://cpapi.fengkuang.cn/api/mobileClientApi.action'),
    'qc_params' => array(
        'need_function' =>array('name'=>'function','type'=>'1','value'=>'saveZhangShangHuDongIdfaEntity'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_ip' => array('name' => 'ip', 'type' => '2'),
        'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'shqmwlkj'),
        'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '02:00:00:00:00:00'),
        'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dbaobao%26id%3D')

    ),
    'qc_ret' => array('format' => 'json', 'field' => 'code', 'succ' => "0000", 'fail' => "1111"),
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

    'active' => array('url' => 'http://cpapi.fengkuang.cn/api/mobileClientApi.action'),
    'active_params' => array(
        'need_function' =>array('name'=>'function','type'=>'1','value'=>'saveZhangShangHuDongIdfaEntity'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_ip' => array('name' => 'ip', 'type' => '2'),
        'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '02:00:00:00:00:00'),
        'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'shqmwlkj'),
        'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dbaobao%26id%3D')
    ),
    'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => "0000", 'fail' => "1111"),
);
echo json_encode($data);
