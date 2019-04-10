
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 1,
    'qc' => array('url' => 'http://repeat.dxshiwan.com/home/union/qc','type'=>'G'),
    'qc_params' => array(
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_appid' => array('name' => 'appiosid', 'type' => '1', 'value' => '769'),
        'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
        'need_ip' => array('name' => 'ip', 'type' => '2'),
        'need_os' => array('name' => 'os', 'type' => '2'),
        'need_mdl' => array('name' => 'platform', 'type' => '2'),
        'need_keyword' => array('name' => 'keywords', 'type' => '2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' =>1, 'fail' =>0),

      /*'click' => array('url' => 'https://jiliguala.com/api/track/feedback', 'type' => 'G'),
        'click_params' => array(
            'need_feedback_source' => array('name' => 'feedback_source', 'type' => '1', 'value' => 'ASO_NGBJ'),
            'need_feedback_id' => array('name' => 'feedback_id', 'type' => '1', 'value' => 'asongbj_jm20190401'),
            'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'ASO_NGBJ'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '928864273'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),*/

    'active' => array('url' => 'http://repeat.dxshiwan.com/home/union/click','type'=>'G'),
    'active_params' => array(
        'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
        'need_appid' => array('name' => 'appiosid', 'type' => '1', 'value' => '769'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_ip' => array('name' => 'ip', 'type' => '2'),
        'need_os' => array('name' => 'os', 'type' => '2'),
        'need_mdl' => array('name' => 'platform', 'type' => '2'),
        'need_keyword' => array('name' => 'keywords', 'type' => '2'),
        'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3DXSJF%26id%3D'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
);
echo json_encode($data);
