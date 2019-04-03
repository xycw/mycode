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

    'qc' => array('url' => 'http://ios.apipi.store/i/tf/check_idfa', 'type' => 'G'),
    'qc_params' => array(
        'need_adid' =>array('name'=>'adid','type'=>'1','value'=>'1120'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

    'click' => array('url' => 'http://ios.apipi.store/ios/v1/click', 'type' => 'G'),
    'click_params' => array(
        'need_vc' =>array('name'=>'vc','type'=>'1','value'=>'0'),
        'need_src' => array('name' => 'platform','type' =>'1','value' => '2'),
        'need_dev_key' =>array('name' =>'dev_key','type'=>'1','value'=>'641cecfc52a29187b892531f13047f90'),
        'need_appid' =>array('name' =>'task_id','type'=>'1','value'=>'1117'),
        'need_udid' =>array('name'=>'udid','type'=>'1','value'=>'0'),
        'need_user'=>array('name'=>'user_id','type'=>'1','value'=>'0'),
        'need_mac' =>array('name' => 'mac','type' =>'1','value' =>'02:00:00:00:00:00'),
        'need_idfa' =>array('name' => 'imei', 'type' => '2'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
        'need_callback' =>array('name' =>'callback_url','type'=>'1','value'=>''),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1),
    'active' => array('url' => 'http://ios.apipi.store/i/tf/activate_user', 'type' => 'G'),
    'active_params' => array(
        'need_src' => array('name' => 'platform','type' =>'1','value' => '2'),
        'need_task_id' =>array('name'=>'task_id','type'=>'1117','value'=>'1120'),
        'need_idfa' =>array('name' => 'imei', 'type' => '2'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1),
);

echo json_encode($data);
