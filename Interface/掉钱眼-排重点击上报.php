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

    'qc' => array('url' => 'http://dc.chuangqish.cn/connect/371/filter', 'type' => 'G'),
    'qc_params' => array(
        'need_idfa'=>array('name'=>'idfa','type'=>'2'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
        'need_appid'=>array('name'=>'appid','type'=>'1','value'=>'24009'),
        'need_keyword'=>array('name'=>'keyword','type'=>'2','func'=>'urlencode'),
        'need_mdl'=>array('name'=>'model','type'=>'2'),
        'need_os'=>array('name'=>'osVersion','type'=>'2')
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

    'click' => array('url' => 'http://dc.chuangqish.cn/connect/371/callback', 'type' => 'G'),
    'click_params' => array(
        'need_appid'=>array('name'=>'appid','type'=>'1','value'=>'24009'),
        'need_idfa'=>array('name'=>'idfa','type'=>'2'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
        'need_keyword'=>array('name'=>'keyword','type'=>'2','func'=>'urlencode'),
        'need_mdl'=>array('name'=>'model','type'=>'2'),
        'need_callback'=>array('name'=>'callback','type'=>'1','value'=>'http://www.xxx.com'),
        'need_os'=>array('name'=>'osVersion','type'=>'2')
    ),
    'click_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),

    'active' => array('url' => 'http://dc.chuangqish.cn/connect/371/active', 'type' => 'G'),
    'active_params' => array(
        'need_appid'=>array('name'=>'appid','type'=>'1','value'=>'24009'),
        'need_idfa'=>array('name'=>'idfa','type'=>'2'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
        'need_keyword'=>array('name'=>'keyword','type'=>'2','func'=>'urlencode'),
        'need_mdl'=>array('name'=>'model','type'=>'2'),
        'need_callback'=>array('name'=>'callback','type'=>'1','value'=>'http://www.xxx.com'),
        'need_os'=>array('name'=>'osVersion','type'=>'2')
    ),
    'active_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),
);

echo json_encode($data);
