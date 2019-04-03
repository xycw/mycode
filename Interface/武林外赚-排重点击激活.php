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

    'qc' => array('url' => 'http://www.wulinzhuan.com/idfa/check', 'type' => 'G'),
    'qc_params' => array(
        'need_appid' =>array('name' => 'app_id', 'type' => '1','value'=>'962223967'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
        'need_source'=>array('name'=>'app_key','type'=>'1','value'=>'xiaoyuzhuanqian'),
        'need_appsecret'=>array('name'=>'app_secret','type'=>'1','value'=>'xyy2ca34b43da6f2fab77104g098es66'),
        'need_keyword'=>array('name'=>'keyword','type'=>'2','func'=>'urlencode'),
        'need_os'=>array('name'=>'system_version','type'=>'2'),
        'need_mdl'=>array('name'=>'device_name','type'=>'2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 0, 'fail' => 1),

    'click' => array('url' => 'http://www.wulinzhuan.com/idfa/click', 'type' => 'G'),
    'click_params' => array(
        'need_appid' =>array('name' => 'app_id', 'type' => '1','value'=>'962223967'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
        'need_source'=>array('name'=>'app_key','type'=>'1','value'=>'xiaoyuzhuanqian'),
        'need_appsecret'=>array('name'=>'app_secret','type'=>'1','value'=>'xyy2ca34b43da6f2fab77104g098es66'),
        'need_keyword'=>array('name'=>'keyword','type'=>'1','value'=>'1'),
        'need_os'=>array('name'=>'system_version','type'=>'2'),
        'need_mdl'=>array('name'=>'device_name','type'=>'2'),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 0, 'fail' => 1),

    'active' => array('url' => 'http://www.wulinzhuan.com/idfa/report', 'type' => 'G'),
    'active_params' => array(
        'need_appid' =>array('name' => 'app_id', 'type' => '1','value'=>'962223967'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
        'need_source'=>array('name'=>'app_key','type'=>'1','value'=>'xiaoyuzhuanqian'),
        'need_appsecret'=>array('name'=>'app_secret','type'=>'1','value'=>'xyy2ca34b43da6f2fab77104g098es66'),
        'need_keyword'=>array('name'=>'keyword','type'=>'2','func'=>'urlencode'),
        'need_os'=>array('name'=>'system_version','type'=>'2'),
        'need_mdl'=>array('name'=>'device_name','type'=>'2'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 0, 'fail' => 1),
);

echo json_encode($data);
