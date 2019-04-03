<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/1/3
 * Time: 下午2:22
 */
class Ren{
    public $name = '张飞';
    public $zuoping = '雷雨';
    public $zuoping2 = '雷雨2';
    public function pai(){
        echo $this->name;
        echo $this->zuoping;
    }
}
$ren = new Ren();
   $ren->pai();
$hao = new Ren();
$hao->pai();

/*echo '<pre>';
$arr1 = array('name'=>'abcaaaaaa','name2'=>'def');
//print_r($arr1[$value]['def']).'<br>';
print_r($arr1);
$arr2['name'] = 'abc';
print_r($arr2);
function GetRemoteURL($url = '', &$statusCode = 200, $timeout = 0, $header = array()){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, (empty($timeout) ? 5 : $timeout));
    curl_setopt($ch, CURLOPT_HEADER, 0);
    if(!empty($header)){
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    }
    $output = curl_exec($ch);
    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $output;
}
$http = 'https://www.mj5188.com/api/channel/deviceInfo';
$idfa = '7B1ECE58-0E46-413F-99E5-BA1CE1A25D88';
$channel = 9106;
$signKey = 'ZL2FCF2SQN7';
$url = $http. '?' . http_build_query([
        'platform' => 1,
        'deviceid' => $idfa,
        'channel' => $channel,
        'sign' => md5('channel=' . $channel . '&deviceid=' . $idfa . '&platform=1' .$signKey),
    ]);
echo  $url;
$ret = GetRemoteURL($url);
echo '<br>';
var_dump($ret);
echo '<br>';
$json_encode = @json_decode($ret,true);
print_r($json_encode);
echo '<br>';
$json_encode['memo'] = '获取用户信息';
$json_encode['url'] = $url;
print_r($json_encode);
echo '<br>';
$play_id = $json_encode['data']['userid'];//取出数组$json_encode中key为[userid]的value
print_r($play_id);*/
echo '</pre>';