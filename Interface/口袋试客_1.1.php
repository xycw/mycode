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

    'qc' => array('url' => 'http://api.kdasm.com/api/ios/sdk/IDFA_CHECK.php', 'type' => 'G'),
    'qc_params' => array(
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_bid'=>array('name'=>'bundleid','type'=>'1','value'=>'com.lexue.lexuegaokao'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => "0", 'fail' => "1"),

    'active' => array('url' => 'http://api.kdasm.com/api/ios/sdk/IDFA_CLICK.php', 'type' => 'G'),
    'active_params' => array(
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_bid'=>array('name'=>'bundleid','type'=>'1','value'=>'com.lexue.lexuegaokao'),
        'need_ip'=>array('name'=>'ip','type'=>'2')
    ),
    'active_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => "success", 'fail' => "error"),
);

echo json_encode($data);
