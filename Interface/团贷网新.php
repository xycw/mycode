
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 1,
    'qc' => array('url' => 'https://thirdplat.tuandai.com/api/p/appadv/isExist','type'=>'P'),
    'qc_params' => array(
        //'need_function' =>array('name'=>'function','type'=>'1','value'=>'saveZhangShangHuDongIdfaEntity'),
        'need_channelIndex' => array('name' => 'channelIndex', 'type' => '1', 'value' => 'YDBaec4a1a6d'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        //'need_appid' => array('name' => 'appid', 'type' => '1','value'=>'1214783848'),
        'need_key' => array('name' => 'key', 'type' => '1','value'=>'6800de0d494b11e98e46fa163e123f95','unset'=>true),
        'need_time' => array('name' => 'timestamp', 'type' => '2'),
        'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => 'channelIndex={need_channelIndex}&idfa={need_idfa}&timestamp={need_time}&signKey={need_key}', 'key' => '', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
    ),
    'qc_ret' => array('format' => 'json', 'field' => 'ret', 'succ' => 0, 'fail' => 1),
    /*
        'click' => array('url' => 'uat-tiku.zhan.com/CommonServer/idfa/task/click', 'type' => 'G','header'=>'Accept:application/json'),
        'click_params' => array(
            'need_source' =>array('name'=>'source','type'=>'1','value'=>'xy1809070001'),
            'need_appid' => array('name' => 'appId', 'type' => '1', 'value' => '20180907000990'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_time' => array('name' => 'time', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => 'appId={need_appid}&idfa={need_idfa}&source={need_source}&time={need_time}&key=', 'key' => 'nhaqy438aue', 'func' => 'Join_BaseApiModel::md5Sign','pos' => 2,'lower'=>false,),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),*/

    'active' => array('url' => 'https://thirdplat.tuandai.com/api/p/appadv/click','type'=>'P'),
    'active_params' => array(
        //'need_function' =>array('name'=>'function','type'=>'1','value'=>'saveZhangShangHuDongIdfaEntity'),
        'need_channelIndex' => array('name' => 'channelIndex', 'type' => '1', 'value' => 'YDBaec4a1a6d'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        //'need_appid' => array('name' => 'appid', 'type' => '1','value'=>'1214783848'),
        'need_key' => array('name' => 'key', 'type' => '1','value'=>'6800de0d494b11e98e46fa163e123f95','unset'=>true),
        'need_time' => array('name' => 'timestamp', 'type' => '2'),
        'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => 'channelIndex={need_channelIndex}&idfa={need_idfa}&timestamp={need_time}&signKey={need_key}', 'key' => '', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
        'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dbaobao%26id%3D')
    ),
    'active_ret' => array('format' => 'json', 'field' => 'ret', 'succ' => 0, 'fail' => 1),
);
echo json_encode($data);
