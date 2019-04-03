
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 1,
    'qc' => array('url' => 'http://track1.yuntuds.net/external_ad/distinct3','type'=>'G'),
    'qc_params' => array(
        //'need_function' =>array('name'=>'function','type'=>'1','value'=>'saveZhangShangHuDongIdfaEntity'),
        'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1436198293'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_source' => array('name' => 'source', 'type' => 'xiaoyu'),

    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),
    /*
            'click' => array('url' => 'http://open.shiwan365.com/api/v1/click', 'type' => 'G'),
            'click_params' => array(
                'need_oid' => array('name' => 'oid', 'type' => '1', 'value' => '358'),
                'need_idfa' => array('name' => 'idfa', 'type' => '2'),
                'need_ip' => array('name' => 'ip', 'type' => '2'),
                'need_mdl' => array('name' => 'device_type', 'type' => '2'),
                'need_os' => array('name' => 'os_version', 'type' => '2'),
                'need_keyword' => array('name' => 'keyword', 'type' => '2'),
            ),
            'click_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 1, 'fail' => 0),*/

    'active' => array('url' => 'http://track1.yuntuds.net/external_ad/xiaoyu_click_feedback','type'=>'G'),
    'active_params' => array(
        //'need_function' =>array('name'=>'function','type'=>'1','value'=>'saveZhangShangHuDongIdfaEntity'),
        'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1436198293'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_source' => array('name' => 'source', 'type' => '1','value'=>'xiaoyu'),
        'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3DXSJFfff%26id%3D'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 0, 'fail' => 1),
);
echo json_encode($data);
