
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 1,

    'qc' => array('url' => 'http://dc.chuangqish.cn/connect/371/filter', 'type' => 'G'),
    'qc_params' => array(
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_ip' => array('name' => 'ip', 'type' => '2'),
        'need_keyword' => array('name' => 'keyword', 'type' => '2','func'=>'urlencode'),
        'need_mdl' => array('name' => 'model', 'type' => '2'),
        'need_os' => array('name' => 'osVersion', 'type' => '2'),
        'need_appid' => array('name' => 'appid', 'type' => '1','value'=>'23935'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

    'active' => array('url' => 'http://dc.chuangqish.cn/connect/371/callback', 'type' => 'G'),
    'active_params' => array(
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_ip' => array('name' => 'ip', 'type' => '2'),
        'need_keyword' => array('name' => 'keyword', 'type' => '2','func'=>'urlencode'),
        'need_mdl' => array('name' => 'model', 'type' => '2'),
        'need_os' => array('name' => 'osVersion', 'type' => '2'),
        'need_appid' => array('name' => 'appid', 'type' => '1','value'=>'23935'),
        'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Ddiaoqianyan%26id%3D')
    ),
    'active_ret' => array('format' => 'json', 'field' => 'success','succ' => true, 'fail' => false),
);

echo json_encode($data);
