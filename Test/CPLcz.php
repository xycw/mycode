<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/1/10
 * Time: 上午10:09
 */
echo '<pre>';
 $rechargeLevel = array (
    array ( 'condition' => 0, 'reward' => 0, 'userAward' => 0, 'customAward' => 0, ),
    array ( 'condition' => 10, 'reward' => 10, 'userAward' => 10, 'customAward' => 12, ),
    array ( 'condition' => 390, 'reward' => 15, 'userAward' => 25, 'customAward' => 37, ),
    array ( 'condition' => 1600, 'reward' => 50, 'userAward' => 75, 'customAward' => 137, ),
    array ( 'condition' => 8900, 'reward' => 300, 'userAward' => 375, 'customAward' => 737, ),
);

$curLevel = 0;
$recharge = 400;
foreach ($rechargeLevel as $levelIdx => $condition){

        echo 'condition = '.$condition['condition'].'<br>';
        //echo $levelIdx;
    if($recharge >= $condition['condition']){
        $curLevel = $levelIdx;
    }
        echo 'curLevel'.$curLevel.'<br>';
        echo 'levelIdx'.$levelIdx.'<br>';

}

/*$award_amt = 0;
$awardLevel = intval($apply_info['user_lvl2']); // 已领奖等级
if($awardLevel < $curLevel){
    for($awardLevel += 1; $awardLevel <= $curLevel; $awardLevel++){
        $award_amt += self::$rechargeLevel[ $awardLevel ]['reward'];
    }

    $award_price += $award_amt;
    $award_memo .= "累积充值达等级{$curLevel},获得{$award_amt}元奖励;";

    $upd_data['user_lvl2'] = $curLevel;*/
echo '<pre>';