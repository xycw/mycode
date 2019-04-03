<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/2/18
 * Time: 下午2:45
 *///实例化phpExcel类
 function createtable($list,$filename,$header=array(),$index = array()){
    header("Content-type:application/vnd.ms-excel");
    header("Content-Disposition:filename=".$filename.".xls");
    $teble_header = implode("\t",$header);
    $strexport = $teble_header."\r";
    foreach ($list as $row){
        foreach($index as $val){
            $strexport.=$row[$val]."\t";
        }
        $strexport.="\r";

    }
    $strexport=iconv('UTF-8',"GB2312//IGNORE",$strexport);
    exit($strexport);
}
$filename = '提现记录'.date('YmdHis');
$header = array('会员','编号','联系电话','开户名','开户行','申请金额','手续费','实际金额','申请时间');
$index = array('username','vipnum','mobile','checkname','bank','money','handling_charge','real_money','applytime');
 createtable($cash,$filename,$header,$index);