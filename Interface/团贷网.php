
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 0,
    'qc' => array('url' => 'http://matrix-dev.versa-ai.com/matrix/xiaoyu/query', 'type' => 'G','header'=>'Accept:application/json'),
    'qc_params' => array(
        'need_channelIndex' =>array('name'=>'channelIndex','type'=>'1','value'=>'xy1809070001'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_timestamp' => array('name' => 'timestamp', 'type' => '2'),
        'need_key'=>array('name'=>'key','type'=>'1','value'=>'15003277455e11e98e46fa163e123f95','unset',true),
        'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => 'channelIndex={need_channelIndex}&idfa={need_idfa}&timestamp={need_timestamp}&key={need_key}', 'key' => 'nhaqy438aue', 'func' => 'Join_BaseApiModel::md5Sign','pos' => 2,'lower'=>false,),
    ),
    'qc_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),
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

    'active' => array('url' => 'https://thirdplat.tuandai.com/api/p/appadv/click', 'type' => 'G','header'=>'Accept:application/json'),
    'active_params' => array(
        'need_channelIndex' =>array('name'=>'channelIndex','type'=>'1','value'=>'xy1809070001'),
        'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        'need_timestamp' => array('name' => 'timestamp', 'type' => '2'),
        'need_key'=>array('name'=>'key','type'=>'1','value'=>'15003277455e11e98e46fa163e123f95','unset',true),
        'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => 'channelIndex={need_channelIndex}&idfa={need_idfa}&timestamp={need_timestamp}&key={need_key}', 'key' => 'nhaqy438aue', 'func' => 'Join_BaseApiModel::md5Sign','pos' => 2,'lower'=>false,),
        'need_callback' => array('name' => 'CallbackUrl', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dbaobao%26id%3D')
    ),
    'active_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),
);
echo json_encode($data);
