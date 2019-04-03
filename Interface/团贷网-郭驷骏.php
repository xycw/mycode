
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 1,

    'qc' => array('url' => 'http://dx1.tuandai800.cn:9018/api/p/appadv/isExist', 'type' => 'G'),
    'qc_params' => array(
        'need_tdfrom' => array('name' => 'tdfrom', 'type' => '1', 'value' => 'YDBaec4a1a6d'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_time' =>array('name' => 'time', 'type' => '2'),
        'need_signKey' =>array('name' => 'signKey', 'type' => '1','value'=>'15003277455e11e98e46fa163e123f95','unset'=>true),
        'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => 'tdfrom={need_tdfrom}&idfa={need_idfa}&time={need_time}&signKey={need_signKey}','func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
    ),
    'qc_ret' => array('format' => 'json', 'field' => 'ret', 'succ' => 0, 'fail' => 1),
    /*
        'click' => array('url' => 'http://new.out.feiniuapp.com/feiniu.click', 'type' => 'G'),
        'click_params' => array(
            'need_appid' => array('name' => 'out_id', 'type' => '1', 'value' => '670'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dbaobao%26id%3D')
        ),
        'click_ret' => array('format' => 'json', 'field' => 'code','succ' => 1, 'fail' => 0),*/
    'active' => array('url' => 'http://dx1.tuandai800.cn:9018/api/p/appadv/click', 'type' => 'G'),
    'active_params' => array(
        'need_tdfrom' => array('name' => 'tdfrom', 'type' => '1', 'value' => 'YDBaec4a1a6d'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_time' =>array('name' => 'time', 'type' => '2'),
        'need_signKey' =>array('name' => 'signKey', 'type' => '1','value'=>'15003277455e11e98e46fa163e123f95','unset'=>true),
        'need_callback' => array('name' => 'callbackUrl', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dshankefeng%26id%3D'),
        'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => 'tdfrom={need_tdfrom}&idfa={need_idfa}&time={need_time}&signKey={need_signKey}','func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'ret', 'succ' => 0, 'fail' => 1),
);
echo json_encode($data);
