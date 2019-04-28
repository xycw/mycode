<?php
abstract class Join_BaseApiModel
{
    // 业务请求错误码
    static public $ERROR_CODE = array(
        'SUCC' => 0, // 通过
        'FAIL' => 1,    // 未通过
        'TIMEOUT' => 2, // 超时
        'ERRPARAM' => 3,// 异常参数
        'EXCEPT' => 4,  // 异常响应
    );

    // 对接模式
    static public $MODEL = array(
        'ACTIVE' => 0,      // 激活上报
        'CALLBACK' => 1,    // 回调模式
    );

    // 接口标志
    static public $QC_FLAG = 'qc';
    static public $CLICK_FLAG = 'click';
    static public $ACTIVE_FLAG = 'active';
    static private $API_TYPE = array('qc', 'click', 'active');

    static private $HTTP_TIME_OUT = 4;  // 默认请求超时时间4s
    static private $SPIT_KEY_NAME = '@';// 解析接口请求响应的字段拆解分隔符

    /**
     * 下载前的接口请求
     * @param $condition : joint_seller配置的condition
     * @param $values : 业务层传递的动态参数
     */
    abstract public function filterRequest($condition, $values, $need_log = 0);

    /**
     * 下载前的点击接口请求(回调模式)
     * @param $condition : joint_seller配置的condition
     * @param $values : 业务层传递的动态参数
     */
    abstract public function clickRequest($condition, $values, $need_log = 0);


    /**
     * 下载后的接口请求
     * @param $condition : joint_seller配置的condition
     * @param $values : 业务层传递的动态参数
     */
    abstract public function activeRequest($condition, $values, $need_log = 0);

    /**
     * 限制设备校验
     * @param $condition :  joint_seller配置的condition
     * @param $values : 业务层传递的动态参数
     * @return true / false : 条件符合与否
     */
    protected function checkLimit($condition, $values)
    {
        if(isset($condition['limit_os'])){
            $user_iosversion = $values['limit_os'];
            if (empty($user_iosversion)) {
                return false;
            }

            $pos = strpos($user_iosversion, '.');
            if ($pos === false) {
                $iIosVersion = intval($user_iosversion);
            } else {
                $user_iosversion = substr($user_iosversion, 0, $pos);
                $iIosVersion = intval($user_iosversion);
            }

            if(!in_array($iIosVersion, $condition['limit_os'])){
                return false;
            }
        }

        if (isset($condition['limit_dev']) && !in_array($values['limit_dev'], $condition['limit_dev'])) {
            return false;
        }

        return true;
    }


    /**
     * 拼接接口请求
     * @param $apiType : 请求接口的种类
     * @param $condi : joint_seller配置的condition
     * @param $values : 动态参数值
     * @return array($httpStatus, $httpResp) : $httpStatus - 请求状态码，$httpResp - 请求响应
     */
    protected function assembleReq($apiType, $condi, $values, $need_log = 0)
    {
        $httpStatus = 408;  // 默认超时
        $httpResp = '';

        /*
         * 解析出请求参数
         */
        if(!in_array($apiType, self::$API_TYPE)){
            return array($httpStatus, $httpResp);
        }

        $params = array();
        $url = isset($condi[ $apiType ]['url']) ? $condi[ $apiType ]['url'] : '';

        // 不需要对应接口配置
        if(empty($url)){
            return array(200, 'DEFAULT');
        }

        foreach ($condi[ $apiType . '_params'] as $need_name => $item){
            // 特殊参数处理
            switch ($need_name){
                case 'need_time':// 时间戳
                    $values['need_time'] = !empty($item['opt_micro']) ? intval(microtime(true)*1000) : time();
                    break;
                case 'need_date':// 日期
                    $values['need_date'] = date("Y-m-d");
                    break;
                case 'need_ip':// 客户端IP
                    if(!isset($values['need_ip'])){
                        $values['need_ip'] = '121.40.79.19';
                    }
                    break;
                default:
                    break;
            }

            if($need_name != 'need_sign') {
                switch (intval($item['type'])) {
                    case 1:// 固定值
                        $params[ $item['name'] ] = isset($item['value']) ? $item['value'] : '';
                        break;
                    case 2:// 动态值
                        $params[ $item['name'] ] = isset($values[ $need_name ]) ? $values[ $need_name ] : '';

                        if (isset($item['func'])) {
                            $params[ $item['name'] ] = call_user_func($item['func'], $params[ $item['name'] ]);
                        }
                        break;
                    case 3:// 混合值
                        $params[ $item['name'] ] = isset($item['value']) ? ($item['value'] . $values[ $need_name ]) : $values[ $need_name ];
                        if (isset($item['func'])) {
                            $params[ $item['name'] ] = call_user_func($item['func'], $params[ $item['name'] ]);
                        }
                        break;
                    default:
                        break;
                }
            }
            if ($need_name == 'need_idfa') {//idfa格式
                if (isset($item['format'])) {
                    switch ($item['format']) {
                        case 'array':// 数组
                            $params[$item['name']] = [$params[$item['name']]];
                            break;
                        case 'json':// json
                            $params[$item['name']] = json_encode([$params[$item['name']]]);
                            break;
                        case 'taobao_baichuan':// json
                            $params[$item['name']] = json_encode(['idfa' => $params[$item['name']]]);
                            break;
                        default:
                            break;
                    }
                }
            }
        }

        // 增加签名
        if(isset($condi[ $apiType . '_params']['need_sign'])){
            // 对初始加密串进行动态参数替换
            $srcStr = $condi[ $apiType . '_params' ]['need_sign']['value'];
            $aryKeys = array_keys($condi[ $apiType . '_params']);

            foreach ($aryKeys as $itemKey){
                if (isset($params[$condi[ $apiType . '_params' ][$itemKey]['name']])) {
                    $srcStr = str_replace('{' . $itemKey . '}', $params[$condi[ $apiType . '_params' ][$itemKey]['name']], $srcStr);
                }
            }

            // 加密函数的参数 func ($key, $src, $keyPos)
            echo "明文: {$srcStr} => KEY: {$condi[ $apiType . '_params']['need_sign']['key']}", "<br>";
            $ret = call_user_func($condi[ $apiType . '_params']['need_sign']['func'],
                            $condi[ $apiType . '_params']['need_sign']['key'],
                            $srcStr,
                            isset($condi[ $apiType . '_params']['need_sign']['pos']) ? $condi[ $apiType . '_params']['need_sign']['pos'] : 1,
                            isset($condi[ $apiType . '_params']['need_sign']['lower']) ? $condi[ $apiType . '_params']['need_sign']['lower'] : true
                    );
            $params[ $condi[ $apiType . '_params']['need_sign']['name'] ] = ($ret !== false ? $ret : '');
        }

        /*
         * 根据模式组装请求,后续发送http请求的也独立出一个模块
         */
        $reqType = isset($condi[ $apiType ]['type']) ? $condi[ $apiType ]['type'] : 'G';
        
        //header动态替换
        $header = [];
        if (isset($condi[ $apiType ]['header'])) {
            $headerStr = $condi[ $apiType ]['header'];
            $aryKeys = array_keys($condi[ $apiType . '_params']);

            foreach ($aryKeys as $itemKey){
                if (isset($params[$condi[ $apiType . '_params' ][$itemKey]['name']])) {
                    $headerStr = str_replace('{' . $itemKey . '}', $params[$condi[ $apiType . '_params' ][$itemKey]['name']], $headerStr);
                }
            }
            $header = @explode(';', $headerStr);
        }

        //剔除无用参数
        foreach ($condi[ $apiType . '_params'] as $item){
            if (isset($item['unset']) && $item['unset']) {
                unset($params[$item['name']]);
            }
        }

        switch($reqType){
            case 'G':
                $paramAry = array();

                foreach ($params as $paramName => $paramValue){
                    $paramAry[] = $paramName . '=' . $paramValue;
                }

                $paramStr = implode('&', $paramAry);

                if(!empty($paramStr)){
                    $url .= '?' . $paramStr;
                }

                $httpResp = $this->sendGETReq($url, 0, $httpStatus, $header);
                echo htmlentities("请求{$apiType}接口：{$url}"), "<br>";
                break;
            case 'P':
                $log['task_id'] = $need_log;
                $log['api_type'] = $apiType;
                $log['url'] = $url;
                $log['params'] = $params;

                $httpResp = $this->sendPOSTReq($url, $params, $header);
                $post_params = http_build_query($params);
                echo htmlspecialchars("请求{$apiType}接口：{$url}; POST {$post_params}"), "<br>";
                break;
            case 'PS':
                $log['task_id'] = $need_log;
                $log['api_type'] = $apiType;
                $log['url'] = $url;
                $log['params'] = $params;

                $httpResp = $this->sendPOSTSReq($url, $params, $header);
                $post_params = http_build_query($params);
                echo htmlspecialchars("请求{$apiType}接口：{$url}; POST {$post_params}"), "<br>";
                break;
            case 'PJ':// post http json
                $log['task_id'] = $need_log;
                $log['api_type'] = $apiType;
                $log['url'] = $url;
                $log['params'] = $params;
                $params = json_encode($params);

                $httpResp = $this->sendPOSTReq($url, $params, $header);
                echo htmlspecialchars("请求{$apiType}接口：{$url}; POST {$params}"), "<br>";
                break;
            case 'PSJ':// post https json
                $log['task_id'] = $need_log;
                $log['api_type'] = $apiType;
                $log['url'] = $url;
                $log['params'] = $params;
                $params = json_encode($params);
                $httpResp = $this->sendPOSTSReq($url, $params, $header);
                echo htmlspecialchars("请求{$apiType}接口：{$url}; POST {$params}"), "<br>";
                break;
            default:
                break;
        }

        if(!empty($httpResp)){
            $httpStatus = 200;
        } elseif($httpStatus == 200 && empty($httpResp)){ // 不允许对接端返回空内容
            $httpStatus = 408;
        }

        return array($httpStatus, $httpResp);
    }


    /**
     * 解析响应
     * @param $apiType : 请求接口的种类
     * @param $condi : joint_seller配置的condition
     * @param $resp : 请求结果的响应
     * @param $values : 动态参数值
     * @return 返回错误码 $ERROR_CODE
     */
    protected function parseResp($apiType, $condi, $resp, $values)
    {
        if(!in_array($apiType, self::$API_TYPE)){
            return self::$ERROR_CODE['ERRPARAM'];
        }

        $rule = isset($condi[ $apiType . '_ret' ]) ? $condi[ $apiType . '_ret' ] : '';
        if(empty($rule)){
            return self::$ERROR_CODE['SUCC'];
        }

        // 替换结果中的动态参数
        $ruleStr = $rule['field'];
        $matches = array();
        preg_match_all('/{(\w+)}/', $ruleStr, $matches);
        foreach ($matches[1] as $matchWord){
            $ruleStr = str_replace('{' . $matchWord . '}', $values[ $matchWord ], $ruleStr);
        }

        $needReplace = [];

        foreach ($condi[ $apiType . '_params'] as $need_name => $item){
            // 特殊参数处理
            switch ($need_name){
                case 'need_time':// 时间戳
                    $values['need_time'] = !empty($item['opt_micro']) ? intval(microtime(true)*1000) : time();
                    break;
                case 'need_date':// 日期
                    $values['need_date'] = date("Y-m-d");
                    break;
                case 'need_ip':// 客户端IP
                    if(!isset($values['need_ip'])){
                        $values['need_ip'] = '121.40.79.19';
                    }
                    break;
                default:
                    break;
            }

            if($need_name != 'need_sign') {
                switch (intval($item['type'])) {
                    case 1:// 固定值
                        $params[ $item['name'] ] = isset($item['value']) ? $item['value'] : '';

                        break;
                    case 2:// 动态值
                        $params[ $item['name'] ] = isset($values[ $need_name ]) ? $values[ $need_name ] : '';

                        if (isset($item['func'])) {
                            $params[ $item['name'] ] = call_user_func($item['func'], $params[ $item['name'] ]);
                        }

                        break;
                    case 3:// 混合值
                        $params[ $item['name'] ] = isset($item['value']) ? ($item['value'] . $values[ $need_name ]) : $values[ $need_name ];
                        if (isset($item['func'])) {
                            $params[ $item['name'] ] = call_user_func($item['func'], $params[ $item['name'] ]);
                        }
                        $needReplace['{' . $need_name . '}'] = $item['value'];
                        break;
                    default:
                        break;
                }
            }
            if ($need_name == 'need_idfa') {//idfa格式
                if (isset($item['format'])) {
                    switch ($item['format']) {
                        case 'array':// 数组
                            $params[$item['name']] = [$params[$item['name']]];
                            break;
                        case 'json':// json
                            $params[$item['name']] = json_encode([$params[$item['name']]]);
                            break;
                        case 'taobao_baichuan':// json
                            $params[$item['name']] = json_encode(['idfa' => $params[$item['name']]]);
                            break;
                        default:
                            break;
                    }
                }
            }
        }


        foreach ($values as $need_name => $item) {
            $needReplace['{' . $need_name . '}'] = $item;
        }

        switch ($rule['format']){
            case 'json':
                $jsonResp = json_decode($resp, true);

                if (empty($jsonResp)) {
                    var_dump($resp);
                }

                $keyNames = explode(self::$SPIT_KEY_NAME, $ruleStr);

                $judgeValue = $jsonResp;
                foreach ($keyNames as $key){
                    if(isset($judgeValue[ $key ])){
                        $judgeValue = $judgeValue[ $key ];
                    } else {
                        return self::$ERROR_CODE['EXCEPT'];
                    }
                }
                return $this->checkRespResult($judgeValue, $rule['succ']);
//                if($judgeValue === $rule['succ']){
//                    return self::$ERROR_CODE['SUCC'];
//                } elseif($judgeValue === $rule['fail']){
//                    return self::$ERROR_CODE['FAIL'];
//                }
//
//                return self::$ERROR_CODE['EXCEPT'];
                break;
            case 'text':// 后续增加解析函数的可配置化
                $textResp = trim($resp);
                foreach ($needReplace as $fieldName => $eachReplace) {
                    $rule['succ'] = str_replace($fieldName, $eachReplace, $rule['succ']);
                    $rule['fail'] = str_replace($fieldName, $eachReplace, $rule['fail']);
                }

                if (isset($rule['func'])) {
                    $rule['succ'] = call_user_func($rule['func'], $rule['succ']);
                    $rule['fail'] = call_user_func($rule['func'], $rule['fail']);
                }

                if (isset($rule['is_full_match']) && empty($rule['is_full_match'])) {//局部匹配
                    if (false !== strpos($textResp, $rule['succ'])) {
                        var_dump($textResp . '_ok');
                        var_dump($textResp . '_ok');
                        $textResp = $rule['succ'];
                    } elseif (false !== strpos($textResp, $rule['fail'])) {
                        var_dump($textResp . '_fail');
                        $textResp = $rule['fail'];
                    }
                }

                if($textResp == $rule['succ']){
                    return self::$ERROR_CODE['SUCC'];
                } elseif($textResp == $rule['fail']){
                    return self::$ERROR_CODE['FAIL'];
                }

                return self::$ERROR_CODE['ERRPARAM'];
                break;
            default:
                return self::$ERROR_CODE['ERRPARAM'];
                break;
        }
    }

    /**
     * 返回值比对校验,只和配置的正确值比较，因为自助后台上没有错误值的配置
     * @return 返回$ERROR_CODE
     */
    protected function checkRespResult($resp_result, $conf_result)
    {
        $check_result = false;
        $return_value_type = gettype($resp_result);
        switch ($return_value_type){
            case 'boolean':
                if(gettype($conf_result) == 'boolean'){
                    $check_result = ($resp_result === $conf_result);
                } else {
                    return self::$ERROR_CODE['EXCEPT'];
                }
                break;
            case 'integer':
                if(is_numeric($conf_result)){
                    $check_result = ($resp_result == $conf_result);
                } else {
                    return self::$ERROR_CODE['EXCEPT'];
                }
                break;
            case 'string':
                $check_result = ($resp_result === $conf_result);
                break;
            default:
                return self::$ERROR_CODE['EXCEPT'];
                break;
        }

        if($check_result){// 校验成功
            return self::$ERROR_CODE['SUCC'];
        } else {// 校验失败
            return self::$ERROR_CODE['FAIL'];
        }
    }


    /**
     * sha1加密处理 - 后续针对解密处理这块可以独立个共用的
     * @param $key : 加密密钥
     * @param $srcStr : 待加密串
     * @param $keyPos : key放置的位置.1 - 左(默认); 2 - 右
     */
    public static function sha1Sign($key, $srcStr, $keyPos = 1, $isLower = true)
    {
        if($keyPos == 2) {
            $ret = sha1($srcStr . $key);
        } else {
            $ret = sha1($key . $srcStr);
        }
        return $isLower ? strtolower($ret) : strtoupper($ret);
    }

    /**
     * md5加密处理 - 后续针对解密处理这块可以独立个共用的
     * @param $key : 加密密钥
     * @param $srcStr : 待加密串
     * @param $keyPos : key放置的位置.1 - 左(默认); 2 - 右
     */
    public static function md5Sign($key, $srcStr, $keyPos = 1, $isLower = true)
    {
        if($keyPos == 2) {
            $ret = md5($srcStr . $key);
        } else {
            $ret = md5($key . $srcStr);
        }
        return $isLower ? strtolower($ret) : strtoupper($ret);
    }

    /**
     * 根据接口类型和内部错误码返回顶层业务逻辑层的错误码
     * 存在的问题：回调的点击通知和激活上报的激活接口返回值共用
     */
    protected function getTopError($apiType, $innerError)
    {
        switch ($apiType){
            case self::$QC_FLAG:
                if($innerError == self::$ERROR_CODE['SUCC']){
                    return 0;
                } elseif($innerError == self::$ERROR_CODE['FAIL']) {
                    return 1;
                } else {
                    return 3;
                }
                break;
            case self::$CLICK_FLAG:
                if($innerError == self::$ERROR_CODE['SUCC']){
                    return 0;
                } else {
                    return 6;   // Daniel.C IOS9.0.2 优化错误信息提示
                }
                break;
            case self::$ACTIVE_FLAG:
                if($innerError == self::$ERROR_CODE['SUCC']){
                    return 1;
                } elseif($innerError == self::$ERROR_CODE['TIMEOUT']) {
                    return 2;
                } else {
                    return 3;
                }
                break;
            default:
                break;
        }
    }


    /**
     * 发送GET请求
     */
    protected function sendGETReq($url, $timeOut, &$httpStatus, $header = array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        // curl_setopt($ch,CURLOPT_CAINFO, "/usr/local/src/cacert.pem");
        curl_setopt($ch, CURLOPT_USERAGENT, empty($_SERVER['HTTP_USER_AGENT']) ? '':$_SERVER['HTTP_USER_AGENT']);
        curl_setopt($ch, CURLOPT_TIMEOUT, (empty($timeOut) ? self::$HTTP_TIME_OUT : $timeOut));

        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); //不验证证书下同
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); //

        if(!empty($header)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        } else {
            curl_setopt($ch, CURLOPT_HTTPHEADER, []);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        $output = curl_exec($ch);
        if($output === false){
            echo "<span style='color:red;'>Curl error: " . curl_error($ch) . "</span><br >";
            var_dump($url);
            var_dump($output);
        }
        $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return $output;
    }

    /**
     * 发送POST请求
     */
    protected function sendPOSTReq($url, $postData, $header = array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        if(!empty($header)){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, self::$HTTP_TIME_OUT);
        curl_setopt($ch, CURLOPT_POST, 1);
        if(is_array($postData)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        } else {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        }

        $output = curl_exec($ch);
        if($output === false){
            echo "<span style='color:red;'>Curl error: " . curl_error($ch) . "</span><br >";
        }
        curl_close($ch);
        return $output;
    }

    /**
     * 发送POST https请求
     */
    protected function sendPOSTSReq($url, $postData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);  // 从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        if(is_array($postData)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        } else {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, self::$HTTP_TIME_OUT);

        $output = curl_exec($ch);
        if($output === false){
            echo "<span style='color:red;'>Curl error: " . curl_error($ch) . "</span><br >";
        }
        curl_close($ch);
        return $output;
    }

    /**
     * 获取请求的IP地址
     */
    protected function getReqIP()
    {
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
}
