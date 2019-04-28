<?php
$data =

    [
        ["300000 ","1","0.5"],
        ["1000000 ","2","1"],
        ["3000000 ","3","1"],
        ["6000000 ","5","3"],
        ["12000000 ","10","5"],
        ["30000000 ","20","10"],
        ["60000000 ","30","18"],
        ["120000000 ","50","30"],
        ["300000000 ","200","120"],
        ["600000000 ","400","280"],
        ["1200000000 ","800","560"],
        ["3000000000 ","1800","1260"]
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
?>
