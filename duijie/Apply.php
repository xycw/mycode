<?php

include 'General.php';

class ApplyModel
{
    
    function __construct(){
        
    }
    //$flag代表是否打印所有日志
    public static function apply($joint_task_info, $values)
    {
        if (empty($joint_task_info) || empty($values)) {
            exit('请求参数错误!');
        }
        
        $apiModel = new Join_GeneralModel();

        //请求排重
        $check_qc = $apiModel->filterRequest($joint_task_info, $values);

        switch (intval($check_qc)){
            case 1:
                self::echo_message('排重返回已安装过', -2);
                break;
            case 2:
                self::echo_message("排重接口超时", -11);
                break;
            case 3:
                self::echo_message("排重接口异常", -12);
                break;
            case 4:
                self::echo_message('上报模式点击接口返回失败', -13);
                break;
            case 5:
                self::echo_message("上报模式点击接口返回超时", -14);
                break;
            case 6:
                self::echo_message("上报模式点击接口返回异常", -15);
                break;
            case 7:
                self::echo_message('设备不符合任务要求', -16);
            default:
                echo "<span style='color:red;'>排重、点击通过...</span><br >";
                break;
        }

        //回调模式点击
        if(isset($joint_task_info['need_callback'])
            ||(isset($joint_task_info['newest']) && $joint_task_info['model'] == Join_BaseApiModel::$MODEL['CALLBACK'])) {
            if(isset($joint_task_info['newest']) && $joint_task_info['newest'] == 1){// Daniel.C 新版本对接模块接入
                $check_active = $apiModel->clickRequest($joint_task_info, $values);
            }

            if($check_active == 1){
                echo "<span style='color:red;'>回调模式点击通过...</span><br >";
                $apply_status = 2;
                exit;
            } else {
                $msg = ($check_active == 2 ? "回调模式点击超时）"
                    : ($check_active == 3 ? "回调模式点击异常"
                        : '任务已领完，请选择其他任务.errcode=' . $check_active));
                return self::echo_message($msg, -19);
            }
        }

        //激活上报
        if(isset($joint_task_info['newest'])){
                $act_ret = $apiModel->activeRequest($joint_task_info, $values);
            } else {
                echo "<span style='color:red;'>激活上报异常...</span><br >";
                exit;
            }

            if($act_ret == 1){
                echo "<span style='color:red;'>激活上报成功...</span><br >";
                exit;
            } else {
                echo "<span style='color:red;'>激活上报失败...</span><br >";
                exit;
        }
    }

    public static function echo_message($msg = 'success',$code = 0,$data = array()){
        global $flag;
        echo "<span style='color:red;'>".$msg, "</span><br ><br >";
        !$flag && exit;
    }
}
