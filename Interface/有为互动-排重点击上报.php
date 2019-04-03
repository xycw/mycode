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

    'qc' => array('url' => 'http://47.93.70.4/channel/checkIdfa', 'type' => 'G'),
    'qc_params' => array(
        'need_source'=>array('name'=>'cid','type'=>'1','value'=>'1064'),
        'need_appid' =>array('name' => 'appid','type' =>'1','value' =>'414603431'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),

    ),
    'qc_ret' => array('format' => 'json', 'field' => 'result@allowed', 'succ' => true, 'fail' => false),

    'click' => array('url' => 'http://47.93.70.4/channel/clickIdfa', 'type' => 'G'),
    'click_params' => array(
        'need_source'=>array('name'=>'cid','type'=>'1','value'=>'1064'),
        'need_appid' =>array('name' => 'appid','type' =>'1','value' =>'414603431'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
        'need_keyword'=>array('name'=>'word','type'=>'2'),
        'need_mdl'=>array('name'=>'sysVer','type'=>'2'),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'result@success', 'succ' => true, 'fail' => false),

    'active' => array('url' => 'http://47.93.70.4/channel/submitIdfa', 'type' => 'G'),
    'active_params' => array(
        'need_source'=>array('name'=>'cid','type'=>'1','value'=>'1064'),
        'need_appid' =>array('name' => 'appid','type' =>'1','value' =>'414603431'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
        'need_keyword'=>array('name'=>'word','type'=>'2'),
        'need_mdl'=>array('name'=>'sysVer','type'=>'2'),

    ),
    'active_ret' => array('format' => 'json', 'field' => 'result@success', 'succ' => true, 'fail' => false),
);

echo json_encode($data);
