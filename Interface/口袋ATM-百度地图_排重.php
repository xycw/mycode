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

    'qc' => array('url' => 'http://api.kdatm.cn/show/query/idfa_check.php', 'type' => 'G'),
    'qc_params' => array(
        'need_adid' =>array('name' => 'adid', 'type' => '1','value'=>'10152'),
        'need_bundleid'=>array('name'=>'bundleid','type'=>'1','value'=>'com.baidu.map'),
        'need_source'=>array('name'=>'source','type'=>'1','value'=>'xyzq'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
        'need_os'=>array('name'=>'os','type'=>'2'),
        'need_mdl'=>array('name'=>'dt','type'=>'2'),
        'need_keyword'=>array('name'=>'keyword','type'=>'2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),


    /*'active' => array('url' => 'http://api.kdatm.cn/show/query/click_check.php', 'type' => 'G'),
    'active_params' => array(
        'need_adid' =>array('name' => 'adid', 'type' => '1','value'=>'10152'),
        'need_bundleid'=>array('name'=>'bundleid','type'=>'1','value'=>'com.baidu.BaiduMap'),
        'need_source'=>array('name'=>'source','type'=>'1','value'=>'xyzq'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
        'need_os'=>array('name'=>'os','type'=>'2'),
        'need_mdl'=>array('name'=>'dt','type'=>'2'),
        'need_keyword'=>array('name'=>'keyword','type'=>'2'),
    ),
    'active_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),*/
);

echo json_encode($data);
