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

    'qc' => array('url' => 'http://api.jinrizhuanqian.cn/check/channel_idfa_query', 'type' => 'G'),
    'qc_params' => array(
        'need_adid' =>array('name' => 'adid','type' =>'1','value' => '1061151027cc432'),
        'need_idfa' =>array('name' => 'idfas', 'type' => '2'),
        'need_source' => array('name' => 'channel','type' =>'1','value' => 'xiaoyuzhuanqian'),
        'need_check' =>array('name' => 'check','type' =>'1','value' =>'1'),
        'need_ip' =>array('name'=>'ip','type'=>'2'),

    ),
    'qc_ret' => array('format' => 'json', 'field' => 'data@{need_idfa}', 'succ' => 0, 'fail' => 1),

    'click' => array('url' => 'http://api.jinrizhuanqian.cn/click/channel_idfa_click', 'type' => 'G'),
    'click_params' => array(
        'need_adid' =>array('name' => 'adid','type' =>'1','value' => '1061151027cc432'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_source' => array('name' => 'channel','type' =>'1','value' => 'xiaoyuzhuanqian'),
        'need_keyword'=>array('name'=>'keyword','type'=>'2'),
        'need_ip' =>array('name'=>'ip','type'=>'2'),
        'need_mac'=>array('name'=>'mac','type'=>'2'),
        'need_os'=>array('name'=>'os','type'=>'2'),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1),
);

echo json_encode($data);
