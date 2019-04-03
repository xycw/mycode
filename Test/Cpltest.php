<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/3/8
 * Time: 下午5:29
 */
echo '<pre>';
function GetRemoteURL($url = '', &$statusCode = 200, $timeout = 0, $header = array()){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);//用PHP取回的URL地址
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//获取页面内容，不直接输出到页面 1||true不输出储存
    curl_setopt($ch, CURLOPT_TIMEOUT, (empty($timeout) ? 5 : $timeout));//设置cURL允许执行的最长秒数。
    curl_setopt($ch, CURLOPT_HEADER, 0);//启用时会将头文件的信息作为数据流输出。
    if(!empty($header)){
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);//一个用来设置HTTP头字段的数组
    }
    $output = curl_exec($ch);
    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $output;
}
$http = 'https://www.mj5188.com/api/channel/deviceInfo';
$idfa = '7B1ECE58-0E46-413F-99E5-BA1CE0025D88';
$channel = 9106;
$signKey = 'ZL2FCF2SQN7';
$url = $http. '?' . http_build_query([
        'platform' => 1,
        'deviceid' => $idfa,
        'channel' => $channel,
        'sign' => md5('channel=' . $channel . '&deviceid=' . $idfa . '&platform=1' .$signKey),
    ]);
echo  '$ur='.$url;
$ret = GetRemoteURL($url);
echo '<br>';
print_r($ret);
if(!$ret){
    return array(false,'查询失败');
}
echo '<br>'.'var_dump($ret)_____________';
$json_encode = @json_decode($ret,true);
print_r($json_encode);
echo 'print_r($json_encode);_____________'.'<br>';
$json_encode['memo'] = '获取用户信息';
$json_encode['url'] = $url;
print_r($json_encode);
if(isset($json_encode['code'])&&intval($json_encode['code'])===0){
    echo '成功'.'<br>';
    exit();
}else{
        return array_rand(false,'未获取到个人信息').'<br>';
}
print_r($json_encode);
echo 'print_r($json_encode);______________'.'<br>';
$play_id = $json_encode['data']['userid'];//取出数组$json_encode中key为[userid]的value
echo '<br>'.'print_r($play_id);';
print_r($play_id);

echo '</pre>';