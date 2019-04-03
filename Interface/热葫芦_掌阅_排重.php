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

    'qc' => array('url' => 'http://api.refanqie.com/1/hlw-coreapi/channel/checkIdfa.json', 'type' => 'G'),
    'qc_params' => array(
        'need_appid' =>array('name' => 'appid','type' =>'1','value' => '463150061'),
        'need_source' => array('name' => 'channel','type' =>'1','value' => 'rfqxyzq2016'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),

    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

    'click' => array('url' => 'http://api.refanqie.com/1/hlw-coreapi/channel/reportClick.json', 'type' => 'G'),
    'click_params' => array(
        'need_appid' =>array('name' => 'appid','type' =>'1','value' => '463150061'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_mdl'=>array('name'=>'model','type'=>'2'),
        'need_os'=>array('name'=>'version','type'=>'2'),
        'need_keyword'=>array('name'=>'keyword','type'=>'2'),
        'need_source' => array('name' => 'channel','type' =>'1','value' => 'rfqxyzq2016'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),

    'active' => array('url' => 'http://api.refanqie.com/1/hlw-coreapi/channel/submitIdfa.json', 'type' => 'G'),
    'active_params' => array(
        'need_appid' =>array('name' => 'appid','type' =>'1','value' => '463150061'),
        'need_source' => array('name' => 'channel','type' =>'1','value' => 'rfqxyzq2016'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),
);

echo json_encode($data);
