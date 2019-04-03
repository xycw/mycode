
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 1,
    'qc' => array('url' => 'http://pay-admin.xinjigame.com/adspread/distinct.jhtml', 'type' => 'G'),
    'qc_params' => array(
        'need_source' =>array('name'=>'source','type'=>'1','value'=>'xiaoyu'),
        'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1418343925'),
        'need_idfa' => array('name' => 'idfas', 'type' => '2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1),
    'active' => array('url' => 'http://pay-admin.xinjigame.com/adspread/click.jhtml', 'type' => 'G'),
    'active_params' => array(
        'need_source' =>array('name'=>'source','type'=>'1','value'=>'xiaoyu'),
        'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1418343925'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dbailingdai%26id%3D'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1),
);
echo json_encode($data);
