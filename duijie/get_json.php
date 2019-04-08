
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 0,
    /*'qc' => array('url' => 'http://shokey.shiwan123.com/experienceReward/api/alliance/filter','type'=>'G'),
    'qc_params' => array(
        'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
        'need_adid' => array('name' => 'appid', 'type' => '1', 'value' => '1892'),
        'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1453821010'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_ip' => array('name' => 'ip', 'type' => '2'),
        'need_os' => array('name' => 'version', 'type' => '2'),
        'need_keyword' => array('name' => 'keyword', 'type' => '2'),
        'need_mdl' => array('name' => 'deviceType', 'type' => '2'),
        'need_combine' => array('name' => 'combine', 'type' => '1','value'=>'1'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),*/

       'click' => array('url' => 'http://shokey.shiwan123.com/experienceReward/api/alliance/filter', 'type' => 'G'),
        'click_params' => array(
            'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_adid' => array('name' => 'adid', 'type' => '1', 'value' => '1892'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1453821010'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_os' => array('name' => 'version', 'type' => '2'),
            'need_keyword' => array('name' => 'keyword', 'type' => '2'),
            'need_mdl' => array('name' => 'deviceType', 'type' => '2'),
            'need_combine' => array('name' => 'combine', 'type' => '1','value'=>'1'),
        ),
        'click_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

    'active' => array('url' => 'http://shokey.shiwan123.com/experienceReward/api/alliance/activate','type'=>'G'),
    'active_params' => array(
        'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
        'need_adid' => array('name' => 'adid', 'type' => '1', 'value' => '1892'),
        'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1453821010'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_ip' => array('name' => 'ip', 'type' => '2'),
        'need_os' => array('name' => 'version', 'type' => '2'),
        'need_keyword' => array('name' => 'keyword', 'type' => '2'),
        'need_mdl' => array('name' => 'deviceType', 'type' => '2'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
);
echo json_encode($data);
