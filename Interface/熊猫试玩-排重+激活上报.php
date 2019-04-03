<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2018/8/13
 * Time: 下午1:40
 */

$my = array(

    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 0,

    /*
       *   排重接口配置   type  check  的值为1         0上报  1回调
    */

    'qc' => array('url' => 'http://shokey.shiwan123.com/experienceReward/api/alliance/filter', 'type' => 'G'),
    'qc_params' => array(
        'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1392855948'),
        'need_adid' => array('name' => 'adid', 'type' => '1', 'value' => '1341'),
        'need_combine' => array('name' => 'combine', 'type' => '1', 'value' => '1'),
        'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),

        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_ip' => array('name' => 'ip', 'type' => '2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

    /*
      *   上报接口配置
   */
    'active' => array('url' => 'http://shokey.shiwan123.com/experienceReward/api/alliance/activate', 'type' => 'G'),
    'active_params' => array(
        'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1392855948'),
        'need_adid' => array('name' => 'adid', 'type' => '1', 'value' => '1341'),
        'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),

        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_ip' => array('name' => 'ip', 'type' => '2'),

    ),
    'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),



);
echo  json_encode($my);
