
<?php
header('content-type:application/json;charset=utf8');
$data = array(
    'newest' => 1,
    'channel' => 'Join_GeneralModel',
    'model' => 0,

    'qc' => array('url' => 'http://www.jiuxiaovip.com/open-api/out/idfa/repeat', 'type' => 'G'),
    'qc_params' => array(
        'need_source' => array('name' => 'channel','type' =>'1','value' => 'xiaoyuzhuanqian'),
        'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '62571'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip' =>array('name' => 'ip','type'=>'2'),
        'need_os' =>array('name' =>'os_version','type'=> '2'),
        'need_mdl' =>array('name' =>'phoneModel','type'=> '2'),
        'need_keyword' =>array('name' =>'keywords','type' =>'2'),
    ),
    'qc_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 200, 'fail' => 400),

    'click' => array('url' => 'http://www.jiuxiaovip.com/open-api/out/task/commit', 'type' => 'G'),
    'click_params' => array(
        'need_source' => array('name' => 'channel','type' =>'1','value' => 'xiaoyuzhuanqian'),
        'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '62571'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip' =>array('name' => 'ip','type'=>'2'),
        'need_os' =>array('name' =>'os_version','type'=> '2'),
        'need_mdl' =>array('name' =>'phoneModel','type'=> '2'),
        'need_keyword' =>array('name' =>'keywords','type' =>'2'),
        'need_callback' =>array('name' =>'callback_url','type' =>'1','value' =>''),
    ),
    'click_ret' => array('format' => 'json', 'field' => 'code','succ' => 200, 'fail' => 400),


    'active' => array('url' => 'http://www.jiuxiaovip.com/open-api/out/task/active', 'type' => 'G'),
    'active_params' => array(
        'need_source' => array('name' => 'channel','type' =>'1','value' => 'xiaoyuzhuanqian'),
        'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '62571'),
        'need_idfa' =>array('name' => 'idfa', 'type' => '2'),
        'need_ip' =>array('name' => 'ip','type'=>'2'),
        'need_os' =>array('name' =>'os_version','type'=> '2'),
        'need_mdl' =>array('name' =>'phoneModel','type'=> '2'),
        'need_keyword' =>array('name' =>'keywords','type' =>'2'),
    ),
    'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 200, 'fail' => 400),
);

echo json_encode($data);
