
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 0,
    'qc' => array('url' => 'http://api.xiaoniaozhuanqian.xyz/pub/app/new/isAvailable','type'=>'P'),
    'qc_params' => array(
        //'need_function' =>array('name'=>'function','type'=>'1','value'=>'saveZhangShangHuDongIdfaEntity'),
        'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1454350889'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),

    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://mgapi.dalujinrong.cn/integral/ZQXQ-FQJK/click', 'type' => 'P'),
        'click_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1454350889'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1),

    'active' => array('url' => 'http://mgapi.dalujinrong.cn/integral/ZQXQ-FQJK/active','type'=>'P'),
    'active_params' => array(
        'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1454350889'),
        'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'XYZQ'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1),
);
echo json_encode($data);
