<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/3/19
 * Time: 上午11:01
 */
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
function getMemcachedData($key){
    return $this->memcached->get($key);
}
