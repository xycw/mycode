
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 0,

    'qc' => array('url' => 'http://115.29.78.118/api/query', 'type' => 'G'),
    'qc_params' => array(
        'need_appid' =>array('name' => 'appid','type' =>'1','value' => '10880'),
        'need_chanid' =>array('name' => 'chanid','type' =>'1','value' => '10880'),
        'need_ip' =>array('name' => 'ip','type' =>'2'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => "0", 'fail' => "1"),

    'click' => array('url' => 'http://115.29.78.118/api/click', 'type' => 'G'),
    'click_params' => array(
        'need_appid' =>array('name' => 'appid','type' =>'1','value' => '10880'),
        'need_chanid' =>array('name' => 'chanid','type' =>'1','value' => '10880'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip' =>array('name' => 'ip','type' =>'2'),
        'need_keyword' =>array('name' => 'keywords','type' =>'2'),
        'need_mdl' =>array('name' => 'devicemodel','type' =>'2'),
        'need_os' =>array('name' => 'os','type' =>'2'),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'state', 'succ' => 10000, 'fail' => 1),

    'active' => array('url' => 'http://115.29.78.118/api/active', 'type' => 'G'),
    'active_params' => array(
        'need_appid' =>array('name' => 'appid','type' =>'1','value' => '10880'),
        'need_chanid' =>array('name' => 'chanid','type' =>'1','value' => '10880'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip' =>array('name' => 'ip','type' =>'2'),
        'need_keyword' =>array('name' => 'keywords','type' =>'2'),
        'need_mdl' =>array('name' => 'devicemodel','type' =>'2'),
        'need_os' =>array('name' => 'os','type' =>'2'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'state', 'succ' => 10000, 'fail' => 1),

);

echo json_encode($data);
