<?php
$http = 'https://www.mj5188.com/api/channel/deviceInfo';
$idfa = '7B1ECE58-0E46-413F-99E5-BA1CE1A25D88';
$channel = 9106;
$signKey = 'ZL2FCF2SQN7';
$timeout = 0;
$url = $http. '?' . http_build_query([
        'platform' => 1,
        'deviceid' => $idfa,
        'channel' => $channel,
        'sign' => md5('channel=' . $channel . '&deviceid=' . $idfa . '&platform=1' .$signKey),
    ]);
$ch = curl_init();
$CURLOPT_URL = curl_setopt($ch,CURLOPT_URL,$url);
//var_dump($CURLOPT_URL);
$CURLOPT_TIMEOUT = curl_setopt($ch, CURLOPT_TIMEOUT, (empty($timeout) ? 5 : $timeout));
//var_dump($CURLOPT_TIMEOUT);
$CURLOPT_HEADER = curl_setopt($ch, CURLOPT_HEADER, 0);
//var_dump($CURLOPT_HEADER);
$header = array();
$CURLOPT_HTTPHEADER = curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//var_dump($CUCURLOPT_HEADER);
$output = curl_exec($ch);
$statusCode = curl_getinfo($ch);
//var_dump($output);
//var_dump($statusCode);



?>