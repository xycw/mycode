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

    /*'qc' => array('url' => 'https://adv.8baiwan.cn/jfq/IdfaVerify', 'type' => 'G'),
    'qc_params' => array(
        //'need_source'=>array('name'=>'sourceid','type'=>'1','value'=>'600771'),
        'need_appid' =>array('name' => 'aid','type' =>'1','value' =>'91657914127032271'),
        'need_souce' =>array('name' => 'channelname','type' =>'1','value' =>'hyjfq'),
        'need_cid' =>array('name' => 'cid','type' =>'1','value' =>'qc507i'),
       'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),*/

    'click' => array('url' => 'http://shokey.shiwan123.com/experienceReward/api/alliance/filter', 'type' => 'G'),
    'click_params' => array(
        'need_appid' =>array('name' => 'appid','type' =>'1','value' =>'1404717665'),
        'need_souce' =>array('name' => 'source','type' =>'1','value' =>'xiaoyu'),
        'need_combine' =>array('name' => 'combine','type' =>'1','value' =>'1'),
        'need_adid' =>array('name' => 'adid','type' =>'1','value' =>'1667'),
        'need_idfa' =>array('name' => 'idfa','type' =>'2'),
        'need_ip' =>array('name' => 'ip','type' =>'2'),
        'need_os' =>array('name' => 'os','type' =>'2'),
        'need_keyword' =>array('name' => 'keyword','type' =>'2'),
        'need_mdl' =>array('name' => 'deviceType','type' =>'2'),
    ),
    'click_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

    'active' => array('url' => 'http://shokey.shiwan123.com/experienceReward/api/alliance/activate', 'type' => 'G'),
    'active_params' => array(
        'need_appid' =>array('name' => 'appid','type' =>'1','value' =>'1404717665'),
        'need_souce' =>array('name' => 'source','type' =>'1','value' =>'xiaoyu'),
        'need_adid' =>array('name' => 'adid','type' =>'1','value' =>'1667'),
        'need_idfa' =>array('name' => 'idfa','type' =>'2'),
        'need_ip' =>array('name' => 'ip','type' =>'2'),
        'need_os' =>array('name' => 'os','type' =>'2'),
        'need_keyword' =>array('name' => 'keyword','type' =>'2'),
        'need_mdl' =>array('name' => 'deviceType','type' =>'2'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
);

echo json_encode($data);
