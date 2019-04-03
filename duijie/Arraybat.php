<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/1/8
 * Time: 下午4:08
 */
$data =
    [
        ["10","12","6"],
        ["390","25","12.5"],
        ["1600","100","50"],
        ["8900","600","300"]
    ]

;
$user_awd = cal($data, 2);
$cust_awd = cal($data);
foreach ($data as $k => $v) {
    $ret[] = [
        'condition' => intval($v[0]),
        'reward' => floatval($v[2]),
        'userAward' => $user_awd[$k],
        'customAward' => $cust_awd[$k],
    ];
}
var_export($ret);
function cal($a, $index = 1)
{
    $x = 0;
    $y = [];
    foreach ($a as $key => $value) {
        $x += $value[$index];
        $y[] = $x;
    }
    return $y;
}