<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/3/13
 * Time: 上午11:16
 */
echo '<pre>';
/**
查询用户信息
 */
require_once ('GetRemoteURL.php');
require_once ('Mysqltest.php');
$http = 'https://www.mj5188.com/api/channel/deviceInfo';
$idfa = 'FA449E6C-83E3-4973-B674-F70C04172B91';
$channel = 9106;
$signKey = 'ZL2FCF2SQN7';
$url = $http. '?' . http_build_query([
        'platform' => 1,
        'deviceid' => $idfa,
        'channel' => $channel,
        'sign' => md5('channel=' . $channel . '&deviceid=' . $idfa . '&platform=1' .$signKey),
    ]);
$ret = GetRemoteURL($url);
//print_r($ret);
echo '</<br>';
$json_ret = @json_decode($ret,true);
//print_r($json_ret);
$status = isset($json_ret['code']) ? intval($json_ret['code']) : -1;
switch ($status){
    case 0:
        echo '老用户激活失败，请联系客服';
    case -1:
        echo '老用户激活异常，请联系客服';
    default :
        break;
}
echo '<br>';
if(isset($json_ret['code'])&&intval($json_ret['code'])===0){
    $player_id = $json_ret['data']['userid'];
    $newuser = $json_ret['data']['is_new'];
}else{
    echo '未获取到用户信息';
}
$update = array('player_id'=>$player_id,'status'=>1,'newuser'=>$newuser);
//print_r($update);
/**
查询赢金
 */
$GOLD_INFO = 'https://www.mj5188.com/api/channel/userInfo';
$channel = 9106;
$ewai = 'cpl_mojing_1_';
$url2 = $GOLD_INFO . '?' . http_build_query([
        'userid' => 636205,
        'channel' => $channel,
        'sign' => md5('channel=' .$channel . '&userid=' . 636205 . $signKey),
    ]);
$ret2 = GetRemoteURL($url2);
//print_r($ret2);
$json_ret2 = @json_decode($ret2,true);
$json_ret2['memo'] = '查询赢金';
$json_ret2['url'] = $url2;
//print_r($json_ret2['data']['total_gold']);
$wingold = empty($json_ret2['data']['total_gold']) ? 0 : intval($json_ret2['data']['total_gold']);
//print_r($wingold);
$newUserGoldLevel = array(
    // condition: 达标条件      reward：达标发放     userAward：累积发放
    array ( 'condition' => 0, 'reward' => 0, 'userAward' => 0, 'customAward' => 0.00),
    array ( 'condition' => 50000, 'reward' => 0.5, 'userAward' => 0.5, 'customAward' => 1, ),
    array ( 'condition' => 300000, 'reward' => 0.5, 'userAward' => 1, 'customAward' => 2, ),
    array ( 'condition' => 800000, 'reward' => 1, 'userAward' => 2, 'customAward' => 4, ),
    array ( 'condition' => 1500000, 'reward' => 1, 'userAward' => 3, 'customAward' => 6, ),
    array ( 'condition' => 5000000, 'reward' => 1.5, 'userAward' => 4.5, 'customAward' => 9, ),
    array ( 'condition' => 8000000, 'reward' => 1.5, 'userAward' => 6, 'customAward' => 12, ),
    array ( 'condition' => 18000000, 'reward' => 2.5, 'userAward' => 8.5, 'customAward' => 17, ),
    array ( 'condition' => 40000000, 'reward' => 2.5, 'userAward' => 11, 'customAward' => 22, ),
    array ( 'condition' => 100000000, 'reward' => 5, 'userAward' => 16, 'customAward' => 32, ),
    array ( 'condition' => 500000000, 'reward' => 15, 'userAward' => 31, 'customAward' => 62, ),
    array ( 'condition' => 1500000000, 'reward' => 30, 'userAward' => 61, 'customAward' => 122, ),
    array ( 'condition' => 3000000000, 'reward' => 40, 'userAward' => 101, 'customAward' => 212, ),
    array ( 'condition' => 5000000000, 'reward' => 60, 'userAward' => 161, 'customAward' => 332, ),
    array ( 'condition' => 10000000000, 'reward' => 100, 'userAward' => 261, 'customAward' => 532, ),
    array ( 'condition' => 30000000000, 'reward' => 260, 'userAward' => 521, 'customAward' => 1032, ),
    array ( 'condition' => 40000000000, 'reward' => 600, 'userAward' => 1121, 'customAward' => 2232, ),
    array ( 'condition' => 60000000000, 'reward' => 1000, 'userAward' => 2121, 'customAward' => 4032, ),
    array ( 'condition' => 80000000000, 'reward' => 1200, 'userAward' => 3321, 'customAward' => 6432, ),
    array ( 'condition' => 100000000000, 'reward' => 1600, 'userAward' => 4921, 'customAward' => 9432, ),
);
$goldLevel = array(
    // condition: 达标条件      reward：达标发放     userAward：累积发放
    array ( 'condition' => 0, 'reward' => 0, 'userAward' => 0, 'customAward' => 0.00),
    array ( 'condition' => 300000, 'reward' => 0.5, 'userAward' => 0.5, 'customAward' => 1, ),
    array ( 'condition' => 800000, 'reward' => 1, 'userAward' => 1.5, 'customAward' => 3, ),
    array ( 'condition' => 1500000, 'reward' => 1, 'userAward' => 2.5, 'customAward' => 5, ),
    array ( 'condition' => 5000000, 'reward' => 1.5, 'userAward' => 4, 'customAward' => 8, ),
    array ( 'condition' => 8000000, 'reward' => 1.5, 'userAward' => 5.5, 'customAward' => 11, ),
    array ( 'condition' => 18000000, 'reward' => 2.5, 'userAward' => 8, 'customAward' => 16, ),
    array ( 'condition' => 40000000, 'reward' => 2.5, 'userAward' => 10.5, 'customAward' => 21, ),
    array ( 'condition' => 100000000, 'reward' => 5, 'userAward' => 15.5, 'customAward' => 31, ),
    array ( 'condition' => 500000000, 'reward' => 15, 'userAward' => 30.5, 'customAward' => 61, ),
    array ( 'condition' => 1500000000, 'reward' => 30, 'userAward' => 60.5, 'customAward' => 121, ),
    array ( 'condition' => 3000000000, 'reward' => 40, 'userAward' => 100.5, 'customAward' => 211, ),
    array ( 'condition' => 5000000000, 'reward' => 60, 'userAward' => 160.5, 'customAward' => 331, ),
    array ( 'condition' => 10000000000, 'reward' => 100, 'userAward' => 260.5, 'customAward' => 531, ),
    array ( 'condition' => 30000000000, 'reward' => 260, 'userAward' => 520.5, 'customAward' => 1031, ),
    array ( 'condition' => 40000000000, 'reward' => 600, 'userAward' => 1120.5, 'customAward' => 2231, ),
    array ( 'condition' => 60000000000, 'reward' => 1000, 'userAward' => 2120.5, 'customAward' => 4031, ),
    array ( 'condition' => 80000000000, 'reward' => 1200, 'userAward' => 3320.5, 'customAward' => 6431, ),
    array ( 'condition' => 100000000000, 'reward' => 1600, 'userAward' => 4920.5, 'customAward' => 9431, ),
);
$extraLevel = array(
    // condition: 达标条件   reward：达标发放   custReward：达标结算   num：限制人数
    1 => array('condition' => 3000000000, 'reward' => 300.00, 'custReward' => 700.00, 'num' => 3),
);
$goldLevel = $newUserGoldLevel;
$glodCurLevel = 0;

//循环获取用户赢金等级
foreach ($goldLevel as $levelIdx => $condition) {
    if($wingold>=$condition['condition']){//如果用户赢金数据大于赢金奖励数据
        $glodCurLevel = $levelIdx;
    }
}
$award_amt =0;
$awardLevel = 1;
//如果数据库等级小于用户赢金等级
if($awardLevel<$glodCurLevel){
    for($awardLevel+=1;$awardLevel<=$glodCurLevel;$awardLevel++){
        $award_amt+=$goldLevel[$awardLevel]['reward']; //循环取出赢金数组中的赢金等级奖励赋值于$award_amt
    }
}
echo "累计赢金达等级{$glodCurLevel},获得{$award_amt}元奖励";
/**
 * 额外奖励
 */
foreach ($extraLevel as $levelIdx => $condition){
    if($wingold>=$condition['condition']){
        $key = $ewai.$levelIdx;
    }
}
print_r(count($goldLevel));
echo '</pre>';
