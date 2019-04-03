<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2018/11/14
 * Time: 上午10:35
 */
echo '<pre>';

/*function getDataByUidAGaoeid(){

    echo '123';
}

 function cancelProcess()
{

    $apply_info  = getDataByUidAGaoeid(123);
    return $apply_info;
}
//echo $apply_info.'<br>';

$curtime = time();
$data = array(
    'hl_app_id' => 'appId',
    'hl_user_id' => 'dev',
    'timestamp' => $curtime,
    'sign' => '1dev',
);
print_r($data).'<br>';
$url = http_build_query($data);
print_r($url);
echo '<br>';
$ch = 'http://cp.ddz123.cn/api/v3/game/info.json?' . http_build_query($data);//查询接口拼接
echo '————————————————————————————————————————————————————————————————————————————————————————————————————————————————<br>';
print_r($ch);
echo '<br>';
$timeout = 0;
$HTTP_TIME_OUT = 5;
$header = array();
$ch = curl_init();//初始化
curl_setopt($ch, CURLOPT_URL, $url);//设置传输选项,提供要在请求中使用的URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//获取页面内容作为变量储存，不直接输出到页面
curl_setopt($ch, CURLOPT_TIMEOUT, (empty($timeout) ? $HTTP_TIME_OUT : $timeout));//设置允许请求的最长时间
curl_setopt($ch, CURLOPT_HEADER, 0);//将标头传递给数据流
if(!empty($header)){
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);//设置自定义HTTP标头
}

$output = curl_exec($ch);//执行$ch
$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);//句柄(响应状态码)
curl_close($ch);
//print_r($ch).'<br>';
$book = array('a'=>'xiyouji','b'=>'sanguo','c'=>'shuihu','d'=>'hongloumeng');
//$enc = json_encode($book);
//var_dump($enc).'<br>';
$dec = json_decode($book,true);
//var_dump($dec).'<br>';
//var_dump($obj);
var_dump(json_decode($json, true));*/
/*$appId = 123456789;
$apply_info = '9.2';
$signKey = 'ce9a7ec2efd64f68b697f500fc8359c0';
$curtime = time();
$data = array(
'hl_app_id' => $appId,
'hl_user_id' => $apply_info,
'timestamp' => $curtime,
'sign' => md5($appId . $apply_info. $curtime . $signKey),
);
$url = 'www.baidu.com';
var_dump($data);
echo '<br>';
$enc = (json_encode($data));
var_dump($enc);
echo '<br>';
$dec = @json_decode($enc, true);
echo '<br>';
$dec['test'] = 'test1';
$dec['url'] = $url;
var_dump($dec).'<br>';*/
$goldLevel = array(
    // condition: 达标条件      reward：达标发放     addReward：累积发放
    array('condition' => 0, 'reward' => 0, 'userAward' => 0, 'customAward' => 0.00),
    array('condition' => 0.3, 'reward' => 0.50, 'userAward' => 0.50, 'customAward' => 1.00),
    array('condition' => 1.2, 'reward' => 1.00, 'userAward' => 1.50, 'customAward' => 3.00),
    array('condition' => 3, 'reward' => 1.00, 'userAward' => 2.50, 'customAward' => 5.00),
    array('condition' => 6, 'reward' => 1.50, 'userAward' => 4.00, 'customAward' => 8.00),
    array('condition' => 15, 'reward' => 2.00, 'userAward' => 6.00, 'customAward' => 12.00),
    array('condition' => 30, 'reward' => 4.00, 'userAward' => 10.00, 'customAward' => 20.00),
    array('condition' => 75, 'reward' => 12.00, 'userAward' => 22.00, 'customAward' => 40.00),
    array('condition' => 230, 'reward' => 35.00, 'userAward' => 57.00, 'customAward' => 100.00),
    array('condition' => 750, 'reward' => 100.00, 'userAward' => 157.00, 'customAward' => 250.00),
    array('condition' => 2400, 'reward' => 300.00, 'userAward' => 457.00, 'customAward' => 750.00),
    array('condition' => 7300, 'reward' => 450.00, 'userAward' => 907.00, 'customAward' => 1550.00),
    array('condition' => 22000, 'reward' => 1000.00, 'userAward' => 1907.00, 'customAward' => 3350.00),
    array('condition' => 48000, 'reward' => 7800.00, 'userAward' => 9707.00, 'customAward' => 12150.00),
);
/*foreach ($goldLevel as  $key=>$value)
{
    print_r($value);
}
$cn = $condition['condition'];
echo '$cn=:'.$cn;

$attr=array(
    "one"=>"hello",
    "two"=>"100",
    "three"=>100,
);

//print_r($attr['one']['two']);*/
//print_r($goldLevel);
echo $goldLevel['condition'].'～～～～～～～～～'.'<br>';
var_dump(count($goldLevel)-1);
$curtime = '123';
echo '<br>';
$upd_data['updated_at'] = $curtime;
print_r($upd_data);
$arr = array(
    'hello'=>$upd_data['updated_at']
);
print_r($arr);
$add_exchange = array(
    'uid' => $params['uid'],
    'type' => 'gaoe',
    'money' => $award_price,
    'remain' => $params['balance']+$award_price,
    'memo' => '地址2',
    'created_at' => $curtime['0'],
    'data_id' => $params['gaoe_id']
);

$params = 'buyu20180810AppStore60';
print_r($add_exchange);
$add_exchange['memo'] = '地址';
print_r($add_exchange);
echo '———————————————————————————————00000000—————————————————————';
$hour = date('H');
$minite = date('i');
echo $hour.':'.$minite;
$url = 'www.baidu.com';
$ret = array('qc_params' => array(
    'need_appid' =>array('name' => 'appid','type' =>'1','value' =>'1022219111'),
    'need_source'=>array('name'=>'channelid','type'=>'1','value'=>'qdxiaoyu'),
    'need_idfa' =>array('name' => 'idfa', 'type' => '2'),

),);
echo '————————————————'.'<br>';
$json_ret = @json_encode($ret, true);
echo '154';
var_dump($json_ret);
$json_ret['memo'] = '老用户激活';
$json_ret['url'] = $url;
var_dump($json_ret);
echo '数目'.count($ret);

$goldLevel = array(
    // condition: 达标条件      reward：达标发放     addReward：累积发放
        0 => array ( 'condition' => 300000, 'reward' => 1.0, 'userAward' => 1, 'customAward' => 2, ),
        1 => array ( 'condition' => 1000000, 'reward' => 2.0, 'userAward' => 3, 'customAward' => 6, ),
        2 => array ( 'condition' => 3000000, 'reward' => 4.0, 'userAward' => 7, 'customAward' => 14, ),
        3 => array ( 'condition' => 6000000, 'reward' => 6.0, 'userAward' => 13, 'customAward' => 26, ),
        4 => array ( 'condition' => 15000000, 'reward' => 10.0, 'userAward' => 23, 'customAward' => 46, ),
        5 => array ( 'condition' => 40000000, 'reward' => 21.0, 'userAward' => 44, 'customAward' => 88, ),
        6 => array ( 'condition' => 100000000, 'reward' => 54.0, 'userAward' => 98, 'customAward' => 196, ),
        7 => array ( 'condition' => 300000000, 'reward' => 150.0, 'userAward' => 248, 'customAward' => 496, ),
        8 => array ( 'condition' => 1000000000, 'reward' => 350.0, 'userAward' => 598, 'customAward' => 1196, ),
        9 => array ( 'condition' => 3000000000, 'reward' => 640.0, 'userAward' => 1238, 'customAward' => 2476, ),
        10 => array ( 'condition' => 10000000000, 'reward' => 2000.0, 'userAward' => 3238, 'customAward' => 6476, ),
        11 => array ( 'condition' => 20000000000, 'reward' => 3500.0, 'userAward' => 6738, 'customAward' => 13476, ),
);


$int = 1;
$int+=1;
echo $int.'______11111';
print_r($goldLevel['condition']);

$configs = array(
    "application" => array(
        "directory" => dirname(__FILE__),
        "dispatcher" => array(
            "catchException" => 0,
        ),
        "view" => array(
            "ext" => "phtml",
        ),
    ),
);
$app = new Yaf_Application($configs);

echo '</pre>';


?>