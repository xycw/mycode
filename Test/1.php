<?php
$condition1 = '{"newest":1,"channel":"Join_GeneralModel","model":1,"qc":{"url":"https://api-toolbox-healthcare.qschou.com/api/system/device/checkdup","type":"G"},"qc_params":{"need_idfa":{"name":"idfa","type":"2"},"need_source":{"name":"source","type":"1","value":"xiaoyu"},"need_appid":{"name":"appid","type":"1","value":"1100539967"}},"qc_ret":{"format":"json","field":"data@{need_idfa}","succ":0,"fail":1},"active":{"url":"https://api-toolbox-healthcare.qschou.com/api/system/device/addpromoinfo","type":"P"},"active_params":{"need_idfa":{"name":"idfa","type":"2"},"need_source":{"name":"source","type":"1","value":"xiaoyu"},"need_appid":{"name":"appid","type":"1","value":"1100539967"},"need_callback":{"name":"callback","type":"3","value":"https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3DQSC%26id%3D"}},"active_ret":{"format":"json","field":"data@status","succ":1,"fail":0}}';

$condition =  json_decode($condition1,true);
$values = array(
    'need_idfa' => 1,
    'need_callback' => '18098386_5476',
    'need_ip' => 2,
    'need_os' => '11.4.1',
    'need_mdl' => 'iPhone8,2',
    'limit_os' => '11.4.1',
    'need_keyword' => 3,
    'limit_dev' => 'iPhone8,2',
);

echo strpos($condition1,'');
?>