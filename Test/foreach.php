<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/2/28
 * Time: 上午10:24
 */

$query_data = array(
    'gameid' => 278657,
    'resourceid' => '8002',
    'activityid' => '296',
    'activityid2' => '295',
    'sign' => md5('8002' . '278657' . 'TEAFFnCsI31lxuKUHNMG4WGKp6HgUXZs'),
);
$url = 'http://app.saiding888.cn/Ifs/iosGetUserData.aspx'.'?'.http_build_query($query_data);

?>v