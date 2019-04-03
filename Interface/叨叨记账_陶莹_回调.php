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

    'qc' => array('url' => 'http://shike.ddashi.com/v2/repeat.php', 'type' => 'G'),
    'qc_params' => array(
        'need_appid'=>array('name'=>'appid','type'=>'1','value'=>'387682726'),
        'need_source'=>array('name'=>'source','type'=>'1','value'=>'xiaoyuzhuanqian'),
        'need_idfa'=>array('name'=>'idfa','type'=>'2'),
        'need_key' => array('name' => 'timestamp', 'type' => '1','value'=>'eGlhb3l1emh1YW5xaWFu'),
        'need_mdl'=>array('name'=>'device','type'=>'2'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
        'need_os'=>array('name'=>'osversion','type'=>'2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),
    'click' => array('url' => 'http://shike.ddashi.com/v2/click.php', 'type' => 'G'),
    'click_params' => array(
        'need_appid'=>array('name'=>'appid','type'=>'1','value'=>'387682726'),
        'need_source'=>array('name'=>'source','type'=>'1','value'=>'xiaoyuzhuanqian'),
        'need_idfa'=>array('name'=>'idfa','type'=>'2'),
        'need_key' => array('name' => 'timestamp', 'type' => '1','value'=>'eGlhb3l1emh1YW5xaWFu'),
        'need_mdl'=>array('name'=>'device','type'=>'2'),
        'need_ip'=>array('name'=>'ip','type'=>'2'),
        'need_os'=>array('name'=>'osversion','type'=>'2'),
        'need_keyword'=>array('name'=>'keyword','type'=>'2'),
    ),
    'click_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

    'active' => array('url' => 'http://shike.ddashi.com/v2/confirm.php', 'type' => 'G'),
    'active_params' => array(
        'need_appid'=>array('name'=>'appid','type'=>'1','value'=>'387682726'),
        'need_source'=>array('name'=>'source','type'=>'1','value'=>'xiaoyuzhuanqian'),
        'need_key' => array('name' => 'timestamp', 'type' => '1','value'=>'eGlhb3l1emh1YW5xaWFu'),
        'need_idfa'=>array('name'=>'idfa','type'=>'2'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),
);

echo json_encode($data);
