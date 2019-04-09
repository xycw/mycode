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
        ["159","15","7.5"],
        ["799","60","30"],
        ["3699","300","150"],
        ["8899","500","250"],
        ["18899","800","400"]
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