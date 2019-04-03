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
       *   排重接口配置
    */

    'qc' => array('url' => 'http://www.didazhuan.cn/channelcheck.php', 'type' => 'G'),
    'qc_params' => array(


        'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => 'btjq_xy'),
        'need_format' => array('name' => 'format', 'type' => '1', 'value' => 'json'),

        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_ip' => array('name' => 'ip', 'type' => '2'),
        'need_os' => array('name' => 'os', 'type' => '2'),

    ),
    'qc_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1),

    /*
     *   点击接口配置
    */
    'click' => array('url' => 'http://www.didazhuan.cn/channelclick.php', 'type' => 'G'),
    'click_params' => array(
        'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => 'btjq_xy'),
        'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyuzq'),
        'need_format' => array('name' => 'format', 'type' => '1', 'value' => 'json'),

        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_os' => array('name' => 'os', 'type' => '2'),
        'need_ip' => array('name' => 'ip', 'type' => '2'),
        'need_keyword' => array('name' => 'keyword', 'type' => '2'),

    ),
    'click_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 1, 'fail' => 0),


    /*

       *   激活回调接口配置
    */
    'active' => array('url' => 'http://www.didazhuan.cn/channelreport.php', 'type' => 'G'),
    'active_params' => array(
        'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyuzq'),
        'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => 'btjq_xy'),
        'need_devicename' => array('name' => 'devicename', 'type' => '1', 'value' => ''),
        'need_format' => array('name' => 'format', 'type' => '1', 'value' => 'json'),

        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_ip' => array('name' => 'ip', 'type' => '2'),
        'need_os' => array('name' => 'os', 'type' => '2'),

    ),
    'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 1, 'fail' => 0),


);
echo  json_encode($my);
