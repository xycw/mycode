
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 0,
    'qc' => array('url' => 'http://api.qingjinju.net/RemoveEcho.ashx','type'=>'G'),
    'qc_params' => array(
        //'need_function' =>array('name'=>'function','type'=>'1','value'=>'saveZhangShangHuDongIdfaEntity'),
        'need_adid' => array('name' => 'adid', 'type' => '1', 'value' => '8010'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_ip' => array('name' => 'ip', 'type' => '2'),
        'need_mdl' => array('name' => 'os', 'type' => '2'),
        'need_os' => array('name' => 'osversion', 'type' => '2'),
        'need_btype' => array('name' => 'btype', 'type' => '1', 'value' => '1'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => "0", 'fail' => "1"),

       'click' => array('url' => 'http://api.qingjinju.net/SourceClick.ashx', 'type' => 'G'),
        'click_params' => array(
            'need_adid' => array('name' => 'adid', 'type' => '1', 'value' => '8010'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '7'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_mdl' => array('name' => 'os', 'type' => '2'),
            'need_os' => array('name' => 'osversion', 'type' => '2'),
            'need_keyword' => array('name' => 'KeyWords', 'type' => '2'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),

    /*'active' => array('url' => 'http://api.appems.com/api/cop/idfaactive','type'=>'G'),
    'active_params' => array(
        'need_adid' => array('name' => 'adid', 'type' => '1', 'value' => '8357'),
        'need_ch' => array('name' => 'ch', 'type' => '1', 'value' => 'xiaoyuzhuanqian'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_ip' => array('name' => 'ip', 'type' => '2'),
        'need_os' => array('name' => 'sysver', 'type' => '2'),
        'need_mdl' => array('name' => 'model', 'type' => '2'),
        'need_keyword' => array('name' => 'kid', 'type' => '2','func'=>'urlencode'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1),*/
);
echo json_encode($data);
