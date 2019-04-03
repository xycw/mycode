<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/3/29
 * Time: 下午2:26
 * @PHPEXcel生成文件
 */

date_default_timezone_set("Asia/Shanghai");//设置时区
$date = date("Y-m-d\h:i:s");
$dir = dirname(__FILE__);
require $dir.'/PHPExcel.php';
$objPHPExcel = new PHPExcel();
$objSheet = $objPHPExcel->getActiveSheet();
$objSheet->setTitle('demo');//sheet名称
$objSheet->setCellValue("A1","name")->setCellValue("B1","name3");
$objSheet->setCellValue("A2","name2")->setCellValue("B2","name4");
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,"Excel2007");
$objWriter->save($dir."/{$date}.xlsx");