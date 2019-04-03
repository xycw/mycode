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
    'qc' => array('url' => 'http://www.z-licai.com/ApiForAPP/LittleFishCheck', 'type' => 'G'),
    'qc_params' => array(
        'need_appid'=>array('name'=>'appid','type'=>'1','value'=>'1423560934'),
        'need_idfa'=>array('name'=>'idfa','type'=>'2',),
        'need_aidname'=>array('name'=>'source','type'=>'1','value'=>'臻理财'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

    'active' => array('url' => 'http://www.z-licai.com/ApiForAPP/LittleFishNotify', 'type' => 'G'),
    'active_params' => array(
        'need_appid'=>array('name'=>'appid','type'=>'1','value'=>'1423560934'),
        'need_idfa'=>array('name'=>'idfa','type'=>'2',),
        'need_aidname'=>array('name'=>'source','type'=>'1','value'=>'臻理财'),
        'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3DZLC%26id%3D'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
);

echo json_encode($data);
