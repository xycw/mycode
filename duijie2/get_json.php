
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 1,
    'qc' => array('url' => 'https://e.feidee.net/channel-activate-api/aso/idfa/check','type'=>'G'),
    'qc_params' => array(
        'need_token' => array('name' => 'token', 'type' => '1', 'value' => 'a67464784f0d4f83d6fec06d93f8d45c'),
        'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'qingmo_sui'),
        'need_appid' => array('name' => 'appId', 'type' => '1', 'value' => '1192251326'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_product' => array('name' => 'product', 'type' => '1', 'value' => 'cardniu'),

    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

       /* 'click' => array('url' => 'http://aff.ihmedia.com.cn/channelinterface/toclick', 'type' => 'G'),
        'click_params' => array(
            'need_g' =>array('name'=>'Grant_type','type'=>'1','value'=>'default'),
            'need_is' =>array('name'=>'isClickBack','type'=>'1','value'=>'1'),
            'need_task' =>array('name'=>'taskid','type'=>'1','value'=>'99'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '385919493'),
            'need_channelid' => array('name' => 'channelid', 'type' => '1', 'value' => '215'),
            'need_idfa' => array('name' => 'IDFA', 'type' => '2'),
            'need_ip' => array('name' => 'IP', 'type' => '2'),
            'need_keyword' => array('name' => 'keyword', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '1', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3DXSJF%26id%3D'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),*/

    'active' => array('url' => 'http://e.feidee.net/channel-third-api/logCollect/events/thirdparty','type'=>'G'),
    'active_params' => array(
        'need_businessID' => array('name' => 'businessID', 'type' => '1', 'value' => 'kn_ios_ad'),
        'need_appid' => array('name' => 'appstoreid', 'type' => '1', 'value' => '1192251326'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_ip' => array('name' => 'ip', 'type' => '2'),
        //'need_time' => array('name' => 'timestamp', 'type' => '2'),
        'need_adid' => array('name' => 'adid', 'type' => '1', 'value' => 'qingmo_sui'),
        //'need_os' => array('name' => 'os', 'type' => '2'),
        //'need_mdl' => array('name' => 'mobile_type', 'type' => '2'),
        'need_callback' => array('name' => 'callback', 'type' => '3','value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dshankefeng%26id%3D'),

    ),
    'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
);

echo json_encode($data);
