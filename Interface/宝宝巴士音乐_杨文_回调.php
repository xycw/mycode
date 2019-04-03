<?php
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 1,
    'qc' => array('url' => 'https://tj.babybus.com/wall/Z3m6Zb','type' => 'P'),
    'qc_params' => array(
        'need_idfa' => array('name' => 'IDFA', 'type' => '2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => 'ResultCode','succ' => "0", 'fail' => "1"),


    'click' => array('url' => 'https://tj.babybus.com/click/Z3m6Zb', 'type' => 'P'),
    'active_params' => array(
        'need_ip' => array('name' => 'IP', 'type' => '2'),
        'need_idfa' => array('name' => 'IDFA', 'type' => '2'),
        'need_src' => array('name' => 'Source', 'type' => '1', 'value' => 'xiaoyu'),
        'need_callback' => array('name' => 'CallbackUrl', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dbaobao%26id%3D')
    ),
    'active_ret' => array('format' => 'json', 'field' => 'ResultCode','succ' => "0", 'fail' => "1"),
);