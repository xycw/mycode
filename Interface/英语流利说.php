
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 1,

    'qc' => array('url' => 'https://apineo.llsapp.com/api/personas/ios/exist', 'type' => 'G'),
    'qc_params' => array(
        'need_appid' =>array('name' => 'appId','type' =>'1','value' => '597364850'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => "0", 'fail' => "1"),
    'active' => array('url' => 'https://apineo.llsapp.com/api/personas/ios/ad_click', 'type' => 'P'),
    'active_params' => array(
        'need_appid' =>array('name' => 'appId','type' =>'1','value' => '597364850'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ad' =>array('name' => 'advertiser', 'type' => '1','value'=>'xiaoyuzhuanqian'),
        'need_callbackType' =>array('name' => 'callbackType', 'type' => '1','value'=>'register'),
        'need_callback' => array('name' => 'callbackUrl', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3DLLS%26id%3D')
    ),
    'active_ret' => array('format' => 'json', 'field' => 'success','succ' => true, 'fail' => false),

);

echo json_encode($data);
