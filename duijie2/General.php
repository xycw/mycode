<?php
/**
 * 通用渠道处理
 * User: Daniel.C
 * Date: 2016/11/29
 */

/** 对接格式说明
newest									是否新版本对接处理						O
channel									渠道标志(Join_GeneralModel)     		O
model									配置成是否需要回调(1-回调;0-上报)		O
limit_os								限制系统								M
limit_dev								限制设备								M

qc | click | active						去重|点击|激活 接口(域名)				O
array('url' => '...', 'type' => '[G | P | PS]', 'header' => 'Content-Length:23;Connection:close')
G - GET方式; P - POST(http); PS - POST(https); PJ - POST(json&http); PSJ - POST(json&https)
header - ;符号拼装的是否需要头

qc_params	| click_params | active_params	请求接口参数						O
need_act				平台账户		格式：	### => array('name' => ***, 'type' => '***', 'value' => '***')
need_src				渠道来源		格式：	### => array('name' => ***, 'type' => '***', 'value' => '***')
need_appid				应用标志		格式：	### => array('name' => ***, 'type' => '***', 'value' => '***')
need_mac				MAC地址		格式：	### => array('name' => ***, 'type' => '***', 'value' => '***')
need_time				时间戳		格式：	### => array('name' => ***, 'type' => '***', 'value' => '***')
need_idfa				设备标志		格式：	### => array('name' => ***, 'type' => '***', 'value' => '{***}')
need_ip					需要IP		格式：	### => array('name' => ***, 'type' => '***', 'value' => '{***}')
need_serverip			需要服务器IP 格式：	### => array('name' => ***, 'type' => '***', 'value' => '{***}')
need_os		    		系统版本		格式：	### => array('name' => ***, 'type' => '***', 'value' => '{***}')
need_mdl    			设备类型		格式：	### => array('name' => ***, 'type' => '***', 'value' => '{***}')
need_keyword			关键词参数	格式：	### => array('name' => ***, 'type' => '***', 'value' => '{***}')
need_callback			回调地址		格式：	### => array('name' => ***, 'type' => '***', 'value' => '***')
need_sign				需要签名		格式：	### => array('name' => ***, 'type' => '***', 'value' => '***', 'key' => '***', 'func' => '***', 'pos' => ***)
说明：
name	-	参数名
type	-	值方式，固定值(1) / 动态值(2) / 混合值(3)
value	-	具体参数值,如是动态值，此参数不存在;如果是混合值,直接在value后面增加传入的参数值
need_sign - value是需要进行替换的加密串;key是加密密钥;func是加密函数
加密函数必须定义为static，并且参数为key和加密串
pos表示key的位置，1 - 置左边(默认);2 - 置右边

qc_ret	| click_ret	| active_ret		返回值判断								O
### => array('format' =>  '***', 'field' => '***@***', 'succ' => value, 'fail' => value)
说明：
format 	返回格式; json / text
field	表示多层级返回的待判断字段(动态字段处理？)
succ	成功判断值
fail	失败判断值
 */
include 'BaseApi.php';
class Join_GeneralModel extends Join_BaseApiModel
{
    public function filterRequest($condition, $values, $need_log = 0)
    {
        // 限制设备校验
        if(!$this->checkLimit($condition, $values)){
            return 7;
        }

        // 拼装去重
        list($httpStatus, $httpResp) = $this->assembleReq(self::$QC_FLAG, $condition, $values, $need_log);
        echo "idfa：{$values['need_idfa']} ===> QC响应: {$httpStatus} - {$httpResp}<br >";

        if($httpStatus == 408 || (empty($httpStatus) && empty($httpResp)) || $httpStatus != 200){
            return 2;
        }

        // 解析去重结果
        if($httpStatus == 200 && !empty($httpResp)){
            $errcode = $this->parseResp(self::$QC_FLAG, $condition, $httpResp, $values);
            if($errcode != self::$ERROR_CODE['SUCC']){
                global $flag;
                if (!$flag) {
                    return $this->getTopError(self::$QC_FLAG, $errcode);
                }
            }
        }

        if($condition['model'] == self::$MODEL['ACTIVE']){
            // 非回调模式的点击通知
            list($httpStatus, $httpResp) = $this->assembleReq(self::$CLICK_FLAG, $condition, $values, $need_log);
            echo "idfa：{$values['need_idfa']} ===> CLICK响应：{$httpStatus} - {$httpResp}<br >";

            if($httpStatus == 408 || (empty($httpStatus) && empty($httpResp))  || $httpStatus != 200){
                return 5; // Daniel.C IOS9.0.2 优化错误信息提示
            }

            // 解析点击通知响应
            $errcode = $this->parseResp(self::$CLICK_FLAG, $condition, $httpResp, $values);
            return $this->getTopError(self::$CLICK_FLAG, $errcode);
        } else {
            return $this->getTopError(self::$QC_FLAG, $errcode);
        }
    }

    public function clickRequest($condition, $values, $need_log = 0)
    {
        // 回调模式的点击通知
        list($httpStatus, $httpResp) = $this->assembleReq(self::$ACTIVE_FLAG, $condition, $values, $need_log);
        echo "idfa：{$values['need_idfa']} ===> CLICK(回调模式)响应:{$httpStatus} - {$httpResp}<br >";

        if($httpStatus == 408 || (empty($httpStatus) && empty($httpResp))){
            return 5;   // Daniel.C IOS9.0.2 优化错误信息提示
        }

        // 解析点击结果
        if($httpStatus == 200 && !empty($httpResp)){
            $errcode = $this->parseResp(self::$ACTIVE_FLAG, $condition, $httpResp, $values);
            return $this->getTopError(self::$ACTIVE_FLAG, $errcode);
        }

        return 5;
    }

    public function activeRequest($condition, $values, $need_log = 0)
    {
        // 非回调模式的激活上报
        list($httpStatus, $httpResp) = $this->assembleReq(self::$ACTIVE_FLAG, $condition, $values, $need_log);
        echo "idfa：{$values['need_idfa']} ===> ACTIVE响应:{$httpStatus} - {$httpResp}<br >";

        if($httpStatus == 408 || (empty($httpStatus) && empty($httpResp))){
            return 2;
        }

        // 解析点击结果
        if($httpStatus == 200 && !empty($httpResp)){
            $errcode = $this->parseResp(self::$ACTIVE_FLAG, $condition, $httpResp, $values);
            return $this->getTopError(self::$ACTIVE_FLAG, $errcode);
        }

        return 3;
    }
}
