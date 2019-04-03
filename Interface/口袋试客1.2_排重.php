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

    'qc' => array('url' => 'http://api.kdatm.cn/show/query/idfa_check2.php', 'type' => 'G'),
    'qc_params' => array(
        'need_source'=>array('name'=>'source','type'=>'1','value'=>'xyzq'),
        'need_adid'=>array('name'=>'adid','type'=>'1','value'=>'10022'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
        'need_bid'=>array('name'=>'bid','type'=>'1','value'=>'com.360buy.jdmobile'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),
);

echo json_encode($data);
