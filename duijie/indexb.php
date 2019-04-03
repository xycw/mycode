<?php

error_reporting(E_ALL^E_NOTICE);

include 'Apply.php';

$condition = $_REQUEST['condition'];
$idfa = htmlspecialchars($_REQUEST['idfa']);
$ip = htmlspecialchars($_REQUEST['ip']);
$keyword = htmlspecialchars($_REQUEST['keyword']);
$flag = htmlspecialchars($_REQUEST['flag']);

//接口配置
//https%3A%2F%2Fwww.xiaoyuzhuanqian.com    换成    http%3A%2F%2Fyu.allfree.cc
$condition = str_replace('https%3A%2F%2Fwww.xiaoyuzhuanqian.com', 'http%3A%2F%2Fyu.allfree.cc', $condition);
$condition = str_replace('https://www.xiaoyuzhuanqian.com', 'http://yu.allfree.cc', $condition);
$joint_task_info = json_decode($condition, true);
empty($idfa) && exit('idfa不能为空');
empty($joint_task_info) && exit('json解析异常');

//动态参数
$values = array(
    'need_idfa' => $idfa,
    'need_callback' => '18098386_5476',
    'need_ip' => $ip,
    'need_os' => '12',
    'need_mdl' => 'iPhone10,2',
    'limit_os' => '11.4.1',
    'need_keyword' => $keyword,
    'limit_dev' => 'iPhone8,2',
);


ApplyModel::apply($joint_task_info, $values);
