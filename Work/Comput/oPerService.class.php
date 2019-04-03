<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2018/10/19
 * Time: 下午4:36
 * 计算符号
 */
class oPerService{
    public function getResult ($num1,$num2,$oper){
        switch ($oper){
            case "+":
                return $num1+$num2;
                break;
            case "-":
                return $num1-$num2;
                break;
            case "*":
                return $num1*$num2;
                break;
            case "/":
                return $num1/$num2;
                break;
            default:
                echo '字符有误';
        }
    }
}