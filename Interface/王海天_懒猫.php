
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 0,

    'qc' => array('url' => 'http://qc.cattryapp.com/Home/Union/qc.html', 'type' => 'G'),
    'qc_params' => array(
        'need_appid' => array('name' => 'appiosid', 'type' => '1', 'value' => '7659'),
        'need_source' => array('name' => 'source', 'type' => '1', 'value' => 'fuyun'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 1, 'fail' => 0),
);

echo json_encode($data);
