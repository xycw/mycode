
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2018/9/2
 * Time: 上午11:07
 */

<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 0,

    'qc' => array('url' => 'http://111.230.78.86:8080/interface/distinct', 'type' => 'G'),
    'qc_params' => array(
        //'need_appid' =>array('name' => 'appid','type' =>'1','value' => '1411819560'),
        'need_appid' =>array('name' => 'appid','type' =>'1','value' =>'1425515913'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),

    ),
    'qc_ret' => array('format' => 'json', 'field' => 'result@{need_idfa}', 'succ' => 0, 'fail' => 1),

    'active' => array('url' => 'http://111.230.78.86:8080/interface/active', 'type' => 'G'),
    'active_params' => array(
        'need_source' => array('name' => 'source','type' =>'1','value' => 'xiaoyuzq'),
        'need_appid' =>array('name' => 'appid','type' =>'1','value' =>'1425515913'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip' =>array('name' =>'ip','type' =>'2'),
        'need_sign' =>array('name'=>'sign','type'=>'3','value' =>'{need_source}|{need_appid}|{need_idfa}|','key'=>'mpnmiepjko5yd8hkjbo7ahvz34xqagy3','func'=>'Join_BaseApiModel::md5Sign','pos'=>'2'),

    ),
    'active_ret' => array('format' => 'json', 'field' => 'err_code', 'succ' => 0, 'fail' => 1),
);

echo json_encode($data);
