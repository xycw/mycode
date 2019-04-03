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
    'qc' => array('url' => 'http://asoapi.appubang.com/api/aso_IdfaRepeat/cpid/3698', 'type' => 'G'),
    'qc_params' => array(
        'need_appid' =>array('name' => 'appid','type' =>'1','value' => '1413132081'),
        'need_adid' =>array('name' => 'adid','type' =>'1','value' => '1'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip' =>array('name'=>'ip','type'=>'2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => "1", 'fail' => "0"),
    'click' => array('url' => 'http://asoapi.appubang.com/api/aso_source/cpid/3698', 'type' => 'G'),
    'click_params' => array(
        'need_idfa'=>array('name'=>'idfa','type'=>'2'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
        'need_mdl'=>array('name'=>'device','type'=>'2'),
        'need_os'=>array('name'=>'os','type'=>'2'),
        'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_time}','key' => 'yf329^$#(&H5d~!d,.(*0', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
        'need_time'=>array('name'=>'timestamp','type'=>'2'),
        'need_keyword'=>array('name'=>'keyword','type'=>'2'),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1),
);

echo json_encode($data);
