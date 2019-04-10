
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 0,
    'qc' => array('url' => 'https://jiliguala.com/api/track/feedback','type'=>'G'),
    'qc_params' => array(
        'need_feedback_source' => array('name' => 'feedback_source', 'type' => '1', 'value' => 'ASO_NGBJ_CHECK'),
        'need_feedback_id' => array('name' => 'feedback_id', 'type' => '1', 'value' => 'asongbj_jm20190401'),
        'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'ASO_NGBJ_CHECK'),
        'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '928864273'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' =>1),

    'click' => array('url' => 'https://jiliguala.com/api/track/feedback', 'type' => 'G'),
    'click_params' => array(
        'need_feedback_source' => array('name' => 'feedback_source', 'type' => '1', 'value' => 'ASO_NGBJ'),
        'need_feedback_id' => array('name' => 'feedback_id', 'type' => '1', 'value' => 'asongbj_jm20190401'),
        'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'ASO_NGBJ'),
        'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '928864273'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),

    'active' => array('url' => 'https://jiliguala.com/api/track/feedback','type'=>'G'),
    'active_params' => array(
        'need_feedback_source' => array('name' => 'feedback_source', 'type' => '1', 'value' => 'ASO_NGBJ_ACTIVATE'),
        'need_feedback_id' => array('name' => 'feedback_id', 'type' => '1', 'value' => 'asongbj_jm20190401'),
        'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'ASO_NGBJ'),
        'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '928864273'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
);
echo json_encode($data);
