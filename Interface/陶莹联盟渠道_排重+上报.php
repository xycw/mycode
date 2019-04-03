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

    'qc' => array('url' => 'http://shokey.shiwan123.com/experienceReward/api/alliance/filter', 'type' => 'G'),
    'qc_params' => array(
        'need_source' => array('name' => 'source','type' =>'1','value' => 'xiaoyu'),
        'need_appid' =>array('name' => 'appid','type' =>'1','value' =>'1198125884'),
        'need_adid' =>array('name' => 'adid','type' =>'1','value' =>'1401'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip' =>array('name' => 'ip', 'type' => '2'),
        'need_os' => array('name' => 'os', 'type' => '2'),
        'need_keyword' => array('name' => 'keyword', 'type' => '2'),
        'need_mdl'=>array('name'=>'deviceType','type'=>'2'),
        'need_combine'=>array('name'=>'combine','type'=>'1','value'=>"1")
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

    'active' => array('url' => 'http://shokey.shiwan123.com/experienceReward/api/alliance/activate', 'type' => 'G'),
    'active_params' => array(
        'need_source' => array('name' => 'source','type' =>'1','value' => 'xiaoyu'),
        'need_appid' =>array('name' => 'appid','type' =>'1','value' =>'1198125884'),
        'need_adid' =>array('name' => 'adid','type' =>'1','value' =>'1401'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip' =>array('name' => 'ip', 'type' => '2'),
        'need_os' => array('name' => 'os', 'type' => '2'),
        'need_keyword' => array('name' => 'keyword', 'type' => '2'),
        'need_mdl'=>array('name'=>'deviceType','type'=>'2'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
);

echo json_encode($data);
