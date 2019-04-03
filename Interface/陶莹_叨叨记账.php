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

    'qc' => array('url' => 'https://daodao.pengdashuju.com/app/promote/query/v1', 'type' => 'G'),
    'qc_params' => array(
        'need_source'=>array('name'=>'source','type'=>'1','value'=>'xiaoyu'),
        'need_appname'=>array('name'=>'appname','type'=>'1','value'=>'ddjz'),
        'need_idfa'=>array('name'=>'idfa','type'=>'2'),
        'need_time' => array('name' => 'timestamp', 'type' => '2'),
        'need_partner_secret'=>array('name'=>'partner_secret','type'=>'1','value'=>'40669566759246ed4b65506e0e550da6','unset'=>true),
        'need_sign' => array('name' => 'sign', 'type' => '3', 'value' =>'{need_partner_secret}{need_appname}{need_idfa}{need_source}{need_time}','key' => '', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
    ),
    'qc_ret' => array('format' => 'json', 'field' => 'data@{need_idfa}', 'succ' => 0, 'fail' => 1),
    'active' => array('url' => 'https://daodao.pengdashuju.com/app/promote/collect/v1', 'type' => 'G'),
    'active_params' => array(
        'need_source'=>array('name'=>'source','type'=>'1','value'=>'xiaoyu'),
        'need_appname'=>array('name'=>'appname','type'=>'1','value'=>'ddjz'),
        'need_idfa'=>array('name'=>'idfa','type'=>'2'),
        'need_time' => array('name' => 'timestamp', 'type' => '2'),
        'need_partner_secret'=>array('name'=>'partner_secret','type'=>'1','value'=>'40669566759246ed4b65506e0e550da6','unset'=>true),
        'need_sign' => array('name' => 'sign', 'type' => '3', 'value' =>'{need_partner_secret}{need_appname}{need_idfa}{need_source}{need_time}','key' => '', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
        'need_callback' => array('name' => 'callBack', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3DQiNiao%26id%3D'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'data@status', 'succ' => 1, 'fail' => 0),
);

echo json_encode($data);
