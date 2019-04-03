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

    'qc' => array('url' => 'http://www.qingmaisui.com/qmserv/psign', 'type' => 'G'),
    'qc_params' => array(
        'need_type'=>array('name'=>'type','type'=>'1','value'=>'1'),
        'need_appid'=>array('name'=>'aid','type'=>'1','value'=>'510909506'),
        'need_source'=>array('name'=>'cid','type'=>'1','value'=>'iOS100004'),
        'need_idfa'=>array('name'=>'did','type'=>'2'),
        'need_ip' =>array('name' => 'ip', 'type' => '2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

    'active' => array('url' => 'http://www.qingmaisui.com/qmserv/psign', 'type' => 'G'),
    'active_params' => array(
        'need_type'=>array('name'=>'type','type'=>'1','value'=>'2'),
        'need_appid'=>array('name'=>'aid','type'=>'1','value'=>'510909506'),
        'need_source'=>array('name'=>'cid','type'=>'1','value'=>'iOS100004'),
        'need_idfa'=>array('name'=>'did','type'=>'2'),
        'need_ip' =>array('name' => 'ip', 'type' => '2'),
        'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3DXianYU%26id%3D'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 200, 'fail' => 201),
);

echo json_encode($data);
