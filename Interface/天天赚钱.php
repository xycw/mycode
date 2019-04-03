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

    'qc' => array('url' => 'http://union.51jpgy.com/union/repeat.html', 'type' => 'G'),
    'qc_params' => array(
        'need_appid' =>array('name' => 'appid', 'type' => '1','value'=>'42'),
        'need_source'=>array('name'=>'source','type'=>'1','value'=>'xiaoyuzhuanqian'),
        'need_idfa' =>array('name' => 'zq_idfa', 'type' => '2'),
        'need_ip'=>array('name'=>'zq_clientip','type'=>'2'),
        'need_os'=>array('name'=>'zq_os','type'=>'2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => 'data@{need_idfa}', 'succ' => 0, 'fail' => 1),

    'click' => array('url' => 'http://union.51jpgy.com/union/click.html', 'type' => 'G'),
    'click_params' => array(
        'need_appid' =>array('name' => 'appid', 'type' => '1','value'=>'42'),
        'need_source'=>array('name'=>'source','type'=>'1','value'=>'xiaoyuzhuanqian'),
        'need_idfa' =>array('name' => 'zq_idfa', 'type' => '2'),
        'need_ip'=>array('name'=>'zq_clientip','type'=>'2'),
        'need_os'=>array('name'=>'zq_os','type'=>'2'),
        'need_keyword'=>array('name'=>'zq_keyword','type'=>'2'),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 1, 'fail' => 0),

    'active' => array('url' => 'http://union.51jpgy.com/union/active.html', 'type' => 'G'),
    'active_params' => array(
        'need_appid' =>array('name' => 'appid', 'type' => '1','value'=>'42'),
        'need_source'=>array('name'=>'source','type'=>'1','value'=>'xiaoyuzhuanqian'),
        'need_idfa' =>array('name' => 'zq_idfa', 'type' => '2'),
        'need_ip'=>array('name'=>'zq_clientip','type'=>'2'),
        'need_os'=>array('name'=>'zq_os','type'=>'2'),
        'need_keyword'=>array('name'=>'zq_keyword','type'=>'2'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 1, 'fail' => 0),
);

echo json_encode($data);
