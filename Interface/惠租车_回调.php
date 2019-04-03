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
    'model' => 0,
    'qc' => array('url' => 'http://game.lygames.cc/index.php', 'type' => 'G'),
    'qc_params' => array(
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_source' =>array('name' => 'source', 'type' => '1','value'=>'2001'),
        'need_appid' =>array('name' => 'appid', 'type' => '1','value'=>'1406678433'),
        'need_m' =>array('name' => 'm', 'type' => '1','value'=>'admin'),
        'need_c' =>array('name' => 'h5sdk'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => 'data@{need_idfa}', 'succ' => 0, 'fail' => 1),
    /*'active' => array('url' => 'http://donut.huizuche.com/app-open-collection/qingmo/notify', 'type' => 'G'),
    'active_params' => array(
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        //'need_source' =>array('name' => 'source', 'type' => '1','value'=>'hzc'),
        'need_appid' =>array('name' => 'appid', 'type' => '1','value'=>'995915747'),
        'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3DHZCCCCCCC%26id%3D'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'data@status', 'succ' => 1, 'fail' => 0),*/
);
echo json_encode($data);
