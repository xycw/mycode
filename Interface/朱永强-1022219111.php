<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2018/9/2
 * Time: 上午10:26
 */
echo '<pre>';
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 0,

    'qc' => array('url' => 'https://m.51rzy.com/app/util/version/IdfaRepeat', 'type' => 'G'),
    'qc_params' => array(
        'need_source'=>array('name'=>'source','type'=>'1','value'=>'xiaoyuzhuanqian'),
        'need_appid' =>array('name' => 'appid','type' =>'1','value' =>'1022219111'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),

    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

    'click' => array('url' => 'https://m.51rzy.com/app/util/version/IdfaClick', 'type' => 'G'),
    'click_params' => array(
        'need_source'=>array('name'=>'source','type'=>'1','value'=>'xiaoyuzhuanqian'),
        'need_appid' =>array('name' => 'appid','type' =>'1','value' =>'1022219111'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),

    'active' => array('url' => 'https://m.51rzy.com/app/util/version/IdfaConfirm', 'type' => 'G'),
    'active_params' => array(
        'need_source'=>array('name'=>'source','type'=>'1','value'=>'xiaoyuzhuanqian'),
        'need_appid' =>array('name' => 'appid','type' =>'1','value' =>'1022219111'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),

    ),
    'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
);

echo json_encode($data);
var_dump($data);
echo '</pre>';
