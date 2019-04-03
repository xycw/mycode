<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2018/9/2
 * Time: 上午10:26
 */



header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 1,

    'qc' => array('url' => 'http://promotion.tantupix.com/api/promotions/4/exclude', 'type' => 'G'),
    'qc_params' => array(
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),


    'active' => array('url' => 'http://promotion.tantupix.com/api/promotions/4/claim','type' => 'G'),
    'active_params' => array(
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3DTantuwang%26id%3D'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),



);
echo json_encode($data);
