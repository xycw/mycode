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
    'qc' => array('url' => 'https://www.xiangshang360.cn/xweb/integral/excludeRepeat', 'type' => 'G'),
    'qc_params' => array(
        'need_idfa'=>array('name'=>'idfa','type'=>'2',),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => "0", 'fail' => "1"),

    'active' => array('url' => 'https://www.xiangshang360.cn/xweb/integral/clickRecord', 'type' => 'G'),
    'active_params' => array(
        'need_idfa'=>array('name'=>'idfa','type'=>'2',),
        'need_appid'=>array('name'=>'appid','type'=>'1','value'=>'768033201'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
        'need_mdl'=>array('name'=>'device','type'=>'2'),
        'need_keyword'=>array('name'=>'keywords','type'=>'2'),
        'need_os'=>array('name'=>'system_version','type'=>'2'),
        'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3DXSJF%26id%3D'),
        'need_source'=>array('name'=>'source','type'=>'1','value'=>'XYZQ'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => "0", 'fail' => "1"),
);

echo json_encode($data);
