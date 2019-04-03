
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 0,

    'qc' => array('url' => 'http://new.out.feiniuapp.com/feiniu.has_repeat', 'type' => 'G'),
    'qc_params' => array(
        'need_appid' => array('name' => 'out_id', 'type' => '1', 'value' => '189'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

    'click' => array('url' => 'http://new.out.feiniuapp.com/feiniu.click', 'type' => 'G'),
    'click_params' => array(
        'need_appid' => array('name' => 'out_id', 'type' => '1', 'value' => '189'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'code','succ' => 1, 'fail' => 0),


    'active' => array('url' => 'http://new.out.feiniuapp.com/feiniu.active', 'type' => 'G'),
    'active_params' => array(
        'need_appid' => array('name' => 'out_id', 'type' => '1', 'value' => '189'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),


    ),
    'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 1, 'fail' => 0),
);

echo json_encode($data);
