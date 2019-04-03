<?php
/**
 * 针对新版格式配置说明
array(
    newest									是否新版本对接处理						O
    channel									渠道标志								O
    model									配置成是否需要回调(1-回调;0-上报)		O
    limit_os								限制系统								M
    limit_dev								限制设备								M


    qc | click | active						去重|点击|激活 接口(域名)				O
    array('url' => '...', 'type' => '[G | P | PS | PJ | PSJ]')
    G - GET方式; P - POST(http); PS - POST(https); PJ - POST(data为json格式); PSJ - POST(https, data为json格式)

    qc_params	| click_params | active_params	请求接口参数						O
    need_act				平台账户		格式：	### => array('name' => ***, 'type' => '***', 'value' => '***')
    need_src				渠道来源		格式：	### => array('name' => ***, 'type' => '***', 'value' => '***')
    need_appid				应用标志		格式：	### => array('name' => ***, 'type' => '***', 'value' => '***')
    need_mac				MAC地址		格式：	### => array('name' => ***, 'type' => '***', 'value' => '***')
    need_time				时间戳		格式：	### => array('name' => ***, 'type' => '***', 'value' => '***')
    need_idfa				设备标志		格式：	### => array('name' => ***, 'type' => '***', 'value' => '{***}')
    need_ip					需要IP		格式：	### => array('name' => ***, 'type' => '***', 'value' => '{***}')
    need_serverip			需要服务器IP	格式：	### => array('name' => ***, 'type' => '***', 'value' => '{***}')
    need_os	    			系统版本		格式：	### => array('name' => ***, 'type' => '***', 'value' => '{***}')
    need_mdl	    		设备类型		格式：	### => array('name' => ***, 'type' => '***', 'value' => '{***}')
    need_keyword			关键词参数	格式：	### => array('name' => ***, 'type' => '***', 'value' => '{***}')
    need_callback			回调地址		格式：	### => array('name' => ***, 'type' => '***', 'value' => '***')
    need_sign				需要签名		格式：	### => array('name' => ***, 'type' => '***', 'value' => '***', 'key' => '***', 'func' => '***', 'pos' => ***)
    说明：
    name	-	参数名
    type	-	值方式，固定值(1) / 动态值(2) / 混合值(3)
    value	-	具体参数值,如是动态值，此参数不存在;如果是混合值,直接在value后面增加传入的参数值
    need_sign - value是需要进行替换的加密串;key是加密密钥;func是加密函数
    加密函数必须定义为static，并且参数为key和加密串
    pos表示key的位置，1 - 置左边(默认);2 - 置右边
    lower表示sign大小写， true - 小写(默认); false - 大写

    type=2的动态参数  -  func是处理函数，例如 urlencode - url转码    strtolower - 转小写
    如要求关键词转码： 'need_keyword' = array('name' => 'keyword' 'type' => 2, 'func' => 'urlencode')

    qc_ret	| click_ret	| active_ret		返回值判断								O
    ### => array('format' =>  '***', 'field' => '***@***', 'succ' => value, 'fail' => value)
    说明：
    format 	返回格式; json / text
    field	表示多层级返回的待判断字段(动态字段处理？)
    succ	成功判断值
    fail	失败判断值
 )
 */

$lanmao_task_id_array = array(
    # 本地排重
    'localfilter' => array(
        'newest' => 1,
        'channel' => 'Join_LocalfilterModel',
        'model' => 0,
        'appstore_id' => 1231326313
    ),

    # 特殊处理 - 人人贷
    'renrendai' => array(
        'newest' => 1,
        'channel' => 'Join_SpecialModel',
        'model' => 1,

        'qc' => array('url' => 'http://node-business.renrendai.com/public/idfa/distinct', 'func' => 'renrendaiQC'),
        'qc_params' => array(
            'need_idfa' => array('name' => 'list', 'type' => '2'),
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_secret' => array('name' => 'secret', 'type' => '1', 'value' => 'UHd9120sa'),
        ),

        'active' => array('url' => 'http://node-business.renrendai.com/public/idfa/xiaoyu', 'func' => 'renrendaiNotice'),
        'active_params' => array(
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_secret' => array('name' => 'secret', 'type' => '1', 'value' => 'UHd9120sa'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'https%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Drenrendai%26id%3D'),
        ),
    ),


    #小鱼通用回调
    #闪聊
    'xiaoyu_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'https://web.shanliaoapp.com/xiaoyu_channel/distinct', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1245032463'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'https://web.shanliaoapp.com/xiaoyu_channel/notify', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1245032463'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fyu.allfree.cc%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dshanliao%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),

    # 合众 - 回调
    'hezhong_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://api.appspread.cn/api/api.php', 'type' => 'G'),
        'qc_params' => array(
            'need_act' => array('name' => 'act', 'type' => '1', 'value' => 'checkidfa'),
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'niaoge'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1326084872'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_time' => array('name' => 'timestamp', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_time}', 'key' => 'yf329^$#(&H5d~!d,.(*0', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => '0', 'fail' => '1'),

        'active' => array('url' => 'http://api.appspread.cn/api/api.php', 'type' => 'G'),
        'active_params' => array(
            'need_act' => array('name' => 'act', 'type' => '1', 'value' => 'clickidfa'),
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'niaoge'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1326084872'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_time' => array('name' => 'timestamp', 'type' => '2'),
            'need_os' => array('name' => 'system_version', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_time}', 'key' => 'yf329^$#(&H5d~!d,.(*0', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fyu.allfree.cc%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dhezhong%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'result', 'succ' => '1', 'fail' => '0'),
    ),

    # 卓森 - imoney - 非回调
    'zhuosen_imoney' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://asoapi.appubang.com/api/aso_IdfaRepeat/cpid/213/', 'type' => 'G'),
        'qc_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1059303021'),
            'need_adid' => array('name' => 'adid', 'type' => '1', 'value' => '159'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => "1", 'fail' => "0"),

        'click' => array('url' => 'http://asoapi.appubang.com/api/aso_source/cpid/213/', 'type' => 'G'),
        'click_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1059303021'),
            'need_adid' => array('name' => 'adid', 'type' => '1', 'value' => '159'),
            'need_reqtype' => array('name' => 'reqtype', 'type' => '1', 'value' => '0'),
            'need_device' => array('name' => 'device', 'type' => '1', 'value' => ''),
            'need_os' => array('name' => 'os', 'type' => '1', 'value' => ''),
            'need_isbreak' => array('name' => 'isbreak', 'type' => '1', 'value' => '0'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_time' => array('name' => 'timestamp', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_time}', 'key' => '53a0dfa13892df377856c4852326c641', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'code', 'succ' => '0', 'fail' => '1'),

        'active' => array('url' => 'http://asoapi.appubang.com/api/aso_Submit/cpid/213/', 'type' => 'G'),
        'active_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1059303021'),
            'need_adid' => array('name' => 'adid', 'type' => '1', 'value' => '159'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_time' => array('name' => 'timestamp', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_time}', 'key' => '53a0dfa13892df377856c4852326c641', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => '0', 'fail' => '1'),
    ),

    # 应用喵 - 非回调
    # 点击接口要传 need_keyword
    'yingyongmiao' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://ios.yingyongmiao.com/api.php', 'type' => 'G'),
        'qc_params' => array(
            'need_act' => array('name' => 'o', 'type' => '1', 'value' => 'check'),
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'xiaoyuzq'),
            'need_appid' => array('name' => 'adsid', 'type' => '1', 'value' => '4831'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://ios.yingyongmiao.com/api.php', 'type' => 'G'),
        'click_params' => array(
            'need_act' => array('name' => 'o', 'type' => '1', 'value' => 'click'),
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'xiaoyuzq'),
            'need_appid' => array('name' => 'adsid', 'type' => '1', 'value' => '4831'),
            'need_keyword' => array('name' => 'keyword', 'type' => '1', 'value' => '新闻'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),

        'active' => array('url' => 'http://ios.yingyongmiao.com/api.php', 'type' => 'G'),
        'active_params' => array(
            'need_act' => array('name' => 'o', 'type' => '1', 'value' => 'active'),
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'xiaoyuzq'),
            'need_appid' => array('name' => 'adsid', 'type' => '1', 'value' => '4831'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_keyword' => array('name' => 'keyword', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),
    ),

    # 同城游 - 非回调
    'tongchengyou' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'https://adpaycheckapi.ct108.com/DuplicateCheck', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'Source', 'type' => '1', 'value' => '10001'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1245032463'),
            'need_idfa' => array('name' => 'IDFA', 'type' => '2')
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 1, 'fail' => 0),

        'active' => array('url' => 'https://adpaycheckapi.ct108.com/Report', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'Source', 'type' => '1', 'value' => '10001'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1245032463'),
            'need_idfa' => array('name' => 'IDFA', 'type' => '2')
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),


    # 蚂蚁技术 - 非回调
    'mayi_tec' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://ios.apipi.store/i/tf/check_idfa', 'type' => 'G'),
        'qc_params' => array(
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '168'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2')
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 2),

        'click' => array('url' => 'http://ios.apipi.store/ios/v1/click', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'platform', 'type' => '1', 'value' => '2'),
            'need_vc' => array('name' => 'vc', 'type' => '1', 'value' => '0'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_user' => array('name' => 'user_id', 'type' => '1', 'value' => '0'),
            'need_devkey' => array('name' => 'dev_key', 'type' => '1', 'value' => '641cecfc52a29187b892531f13047f90'),
            'need_udid' => array('name' => 'udid', 'type' => '1', 'value' => '0'),
            'need_appid' => array('name' => 'task_id', 'type' => '1', 'value' => '168'),
            'need_idfa' => array('name' => 'imei', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_callback' => array('name' => 'callback_url', 'type' => '1', 'value' => ''),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://ios.apipi.store/i/tf/activate_user', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'platform', 'type' => '1', 'value' => '2'),
            'need_appid' => array('name' => 'task_id', 'type' => '1', 'value' => '168'),
            'need_idfa' => array('name' => 'imei', 'type' => '2')
        ),
        'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1)
    ),


    # 点点(零花钱) - 非回调
    'diandian' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://101.200.129.217/api/queryIdfa.php', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'chanid', 'type' => '1', 'value' => '1248'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1853'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2')
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => '0', 'fail' => '1'),

        'click' => array('url' => 'http://101.200.129.217/api/channel_click_api.php', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'chanid', 'type' => '1', 'value' => '1248'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1853'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => ''),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2')
        ),
        'click_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),

        'active' => array('url' => 'http://101.200.129.217/api/channel_active_api.php', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'chanid', 'type' => '1', 'value' => '1248'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1853'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => ''),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2')
        ),
        'active_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false)
    ),

    # 65 - 回调
    '65game' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://sdk102.65.com/offerwall/xiaoyu/api.php', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_act' => array('name' => 'action', 'type' => '1', 'value' => 'distinct'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '153'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2')
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://sdk102.65.com/offerwall/xiaoyu/api.php', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_act' => array('name' => 'action', 'type' => '1', 'value' => 'userclick'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '153'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3D65%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),

    # 久久盒子 - 回调
    'jiujiubox_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'https://b.jianbing.com/feedback/iosCb/jiujiu.php', 'type' => 'G'),
        'qc_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1184190784'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'https://b.jianbing.com/feedback/iosCb/jiujiuUp.php', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'partner', 'type' => '1', 'value' => '2'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1184190784'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Djiujiubox%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),


    # 科大讯飞 - 非回调
    'xunfei' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://openapi.kuyin123.com:8080/thirdparty/smallfish/c_cduplicate', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyuzhuanqian'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1211536863'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2')
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://openapi.kuyin123.com:8080/thirdparty/smallfish/c_capp', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyuzhuanqian'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1211536863'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2')
        ),
        'click_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),

        'active' => array('url' => 'http://openapi.kuyin123.com:8080/thirdparty/smallfish/c_activate', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyuzhuanqian'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1211536863'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2')
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0)
    ),

    # 涌玉 - 回调模式
    'yongyu_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'active' => array('url' => 'http://api.yoyuad.com/api/clickajax', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'yyq', 'type' => '1', 'value' => '952'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dyongyu%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'ret', 'succ' => 0, 'fail' => 1),
    ),

    # 任务试客 - 非回调模式
    'rwsk' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://ad.pher156.com/query', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'A011003'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://ad.pher156.com/checkbill', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'A011003'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),

    # 任务试客 - 回调模式
    'rwsk' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://ad.pher156.com/query', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'A011117'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://ad.pher156.com', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'A011117'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fyu.allfree.cc%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dbudingxiaodai%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),

    # 掉钱眼 - 非回调模式
    'diaoqianyan' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://dc.chuangqish.cn/connect/371/filter', 'type' => 'G'),
        'qc_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '20809'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://dc.chuangqish.cn/connect/371/submit', 'type' => 'G'),
        'active_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '20809'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),
    ),

    // 掉钱眼 - 回调模式
    'diaoqianyan_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://dc.chuangqish.cn/connect/371/filter', 'type' => 'G'),
        'qc_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1176'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://dc.chuangqish.cn/connect/371/callback', 'type' => 'G'),
        'active_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1176'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fyu.allfree.cc%2Findex%2Findex%2Factivecallback%2F%3Ft%3Ddiaoqianyan%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),
    ),

    # 秒赚 - 非回调模式
    'miaozhuan' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://third.miaozhuandaqian.com/www/channel/disctinct_new.3w', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => '76419'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '2031'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_appid}|{need_src}|', 'key' => '3bcb8ad2a1597cfb120cb840f523afa0', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://third.miaozhuandaqian.com/www/channel/click.3w', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => '76419'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '2031'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_appid}|{need_src}|', 'key' => '3bcb8ad2a1597cfb120cb840f523afa0', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://third.miaozhuandaqian.com/www/channel/report_hsk.3w', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => '76419'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '2031'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_appid}|{need_src}|', 'key' => '3bcb8ad2a1597cfb120cb840f523afa0', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'result@{need_idfa}', 'succ' => true, 'fail' => false)
    ),

    # 秒赚 - 回调模式
    'miaozhuan_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://third.miaozhuandaqian.com/www/channel/disctinct_new.3w', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => '76419'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '6596'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_appid}|{need_src}|', 'key' => '3bcb8ad2a1597cfb120cb840f523afa0', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 2),

        'active' => array('url' => 'http://third.miaozhuandaqian.com/www/channel/click.3w', 'type' => 'P'),
        'active_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => '76419'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '6596'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_appid}|{need_src}|', 'key' => '3bcb8ad2a1597cfb120cb840f523afa0', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
            'need_callback' => array('name' => 'callbackurl', 'type' => '3', 'value' => 'http%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dmiaozhuan%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1)
    ),

    # 巨掌 - 非回调模式
    'juzhang' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://api.plat.adjuz.net/distinct', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'sourceid', 'type' => '1', 'value' => '10625'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '10003'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://api.plat.adjuz.net/click', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'sourceid', 'type' => '1', 'value' => '10625'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '10003'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'State', 'succ' => 100, 'fail' => 101),

        'active' => array('url' => 'http://api.plat.adjuz.net/activate', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'sourceid', 'type' => '1', 'value' => '10625'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '10003'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'State', 'succ' => 100, 'fail' => 101)
    ),

    # 行者 - 回调模式
    'xingzhe_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://api.adwalker.cn/AdAPI/common/repeat.do', 'type' => 'P'),
        'qc_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'qingmo'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => 'jdyd'),
            'need_idfa' => array('name' => 'IDFA', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => '0', 'fail' => '2'),

        'active' => array('url' => 'http://api.adwalker.cn/AdAPI/common/cinfo.do', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'qingmo'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => 'jdyd'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => ''),
            'need_idfa' => array('name' => 'IDFA', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dxingzhe%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),
    ),

    # 友榜 - 非回调模式
    'youbang' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://app.ubangok.com/YouBang/SyncServer', 'type' => 'G'),
        'qc_params' => array(
            'need_type' => array('name' => 'type', 'type' => '1', 'value' => 'CheckIDFA'),
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => '10026'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '39'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://app.ubangok.com/YouBang/SyncServer', 'type' => 'G'),
        'click_params' => array(
            'need_type' => array('name' => 'type', 'type' => '1', 'value' => 'ClickSync'),
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => '10026'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '39'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_keyword' => array('name' => 'keyword', 'type' => '1', 'value' => '人人贷'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'resultCode', 'succ' => 1000, 'fail' => 1001),

        'active' => array('url' => 'http://app.ubangok.com/YouBang/SyncServer', 'type' => 'G'),
        'active_params' => array(
            'need_type' => array('name' => 'type', 'type' => '1', 'value' => 'Activation'),
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => '10026'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '39'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_keyword' => array('name' => 'keyword', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'resultCode', 'succ' => 1000, 'fail' => 1001),
    ),

    # 友榜 - 回调模式
    # 瓜子二手车
    'youbang_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://app.ubangok.com/YouBang/SyncServer', 'type' => 'G'),
        'qc_params' => array(
            'need_type' => array('name' => 'type', 'type' => '1', 'value' => 'CheckIDFA'),
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => '10026'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '39'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://app.ubangok.com/YouBang/SyncServer', 'type' => 'G'),
        'active_params' => array(
            'need_type' => array('name' => 'type', 'type' => '1', 'value' => 'ClickSync'),
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => '10026'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '39'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fyu.allfree.cc%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dyoubang%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'resultCode', 'succ' => 1000, 'fail' => 1001),
    ),


    # 内涵红包(掌上) - 回调模式
    'neihanhongbao_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://api.v3.9080app.com/RemoveEcho.ashx', 'type' => 'G'),
        'qc_params' => array(
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '3953'),
            'need_json' => array('name' => 'btype', 'type' => '1', 'value' => '1'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => '0', 'fail' => '2'),

        'active' => array('url' => 'http://api.v5.9080app.com/SourceClick.ashx', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'appid', 'type' => '1', 'value' => '3090'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '3953'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dzhangshang%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),
    ),

    # 肥牛试玩 - 非回调模式
    'feiniu' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://out.feiniuapp.com/77/drem', 'type' => 'G'),
        'qc_params' => array(
            'need_idfa' => array('name' => 'idfa', 'type' => '2')
        ),
        'qc_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://out.feiniuapp.com/77/active_up', 'type' => 'G'),
        'active_params' => array(
            'need_idfa' => array('name' => 'idfa', 'type' => '2')
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),

    # 钱大师 - 非回调模式
    'qiandashi' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://qc.moneyds.com/home/union/qc', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyuzq'),
            'need_appid' => array('name' => 'appiosid', 'type' => '1', 'value' => '1756'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://qc.moneyds.com/home/union/click', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyuzq'),
            'need_appid' => array('name' => 'appiosid', 'type' => '1', 'value' => '1756'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),

        'active' => array('url' => 'http://qc.moneyds.com/home/union/active', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyuzq'),
            'need_appid' => array('name' => 'appiosid', 'type' => '1', 'value' => '1756'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),

    # 口袋试客 - 回调模式
    'kdsk_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://wx.jd61.com/index.php/Home/Api/ChannelCheckIdfa', 'type' => 'G'),
        'qc_params' => array(
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '286'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://wx.jd61.com/index.php/Home/Api/getChannelClick', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'cuid', 'type' => '1', 'value' => '36'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '286'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_udid' => array('name' => 'udid', 'type' => '1', 'value' => ''),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dkoudaishike%26id%3D')
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),


    # 口袋试客 - 非回调模式(不带签名)
    'kdsk_active' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://wx.jd61.com/index.php/Home/Api/ChannelCheckIdfa', 'type' => 'G'),
        'qc_params' => array(
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '286'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://wx.jd61.com/index.php/Home/Api/getChannelClick', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'cuid', 'type' => '1', 'value' => '36'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '286'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_udid' => array('name' => 'udid', 'type' => '1', 'value' => ''),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '1', 'value' => '')
        ),
        'click_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),

        'active' => array('url' => 'http://wx.jd61.com/index.php/Home/Api/nothing_channel_report_activation', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'cuid', 'type' => '1', 'value' => '36'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '190'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2')
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),


    # 口袋试客 - 非回调模式(带签名)
    'kdsk' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://wx.jd61.com/index.php/Home/Api/ChannelCheckIdfa', 'type' => 'G'),
        'qc_params' => array(
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '190'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://wx.jd61.com/index.php/Home/Api/channel_click', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'cuid', 'type' => '1', 'value' => '36'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '190'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_udid' => array('name' => 'udid', 'type' => '1', 'value' => ''),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '1', 'value' => ''),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => 'adid{need_appid}callbackcuid{need_src}idfa{need_idfa}ip{need_ip}mac{need_mac}udid{need_udid}', 'key' => '000B5E5ADE7242CB9D0BCF1921AF', 'func' => 'Join_BaseApiModel::md5Sign'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),

        'active' => array('url' => 'http://wx.jd61.com/index.php/Home/Api/channel_report_activation', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'cuid', 'type' => '1', 'value' => '36'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '190'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => 'adid{need_appid}cuid{need_src}idfa{need_idfa}ip{need_ip}mac{need_mac}', 'key' => '000B5E5ADE7242CB9D0BCF1921AF', 'func' => 'Join_BaseApiModel::md5Sign'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),

    # IMoney - 非回调模式
    'IMoney' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://asoapi.aiyingli.com/api/aso_IdfaRepeat/cpid/213/', 'type' => 'G'),
        'qc_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1249955991'),
            'need_adid' => array('name' => 'adid', 'type' => '1', 'value' => '1'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => '1', 'fail' => '0'),

        'click' => array('url' => 'http://asoapi.aiyingli.com/api/aso_source/cpid/213/', 'type' => 'G'),
        'click_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1249955991'),
            'need_adid' => array('name' => 'adid', 'type' => '1', 'value' => '1'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_time' => array('name' => 'timestamp', 'type' => '2'),
            'need_req' => array('name' => 'reqtype', 'type' => '1', 'value' => '0'),
            'need_dev' => array('name' => 'device', 'type' => '1', 'value' => 'ios'),
            'need_os' => array('name' => 'os', 'type' => '1', 'value' => '9.3'),
            'need_break' => array('name' => 'isbreak', 'type' => '1', 'value' => '0'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_time}', 'key' => '53a0dfa13892df377856c4852326c641', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'code', 'succ' => '0', 'fail' => '1'),

        'active' => array('url' => 'http://asoapi.aiyingli.com/api/aso_Submit/cpid/213/', 'type' => 'G'),
        'active_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1249955991'),
            'need_adid' => array('name' => 'adid', 'type' => '1', 'value' => '1'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_time' => array('name' => 'timestamp', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_time}', 'key' => '53a0dfa13892df377856c4852326c641', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2)
        ),
        'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => '0', 'fail' => '1'),
    ),

    # IMoney - 回调模式
    'IMoney_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://asoapi.aiyingli.com/api/aso_IdfaRepeat/cpid/213/', 'type' => 'G'),
        'qc_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '480079300'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => '1', 'fail' => '0'),

        'active' => array('url' => 'http://asoapi.aiyingli.com/api/aso_source/cpid/213/', 'type' => 'G'),
        'active_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '480079300'),
            'need_req' => array('name' => 'reqtype', 'type' => '1', 'value' => '0'),
            'need_dev' => array('name' => 'device', 'type' => '1', 'value' => 'ios'),
            'need_os' => array('name' => 'os', 'type' => '1', 'value' => '9.3'),
            'need_break' => array('name' => 'isbreak', 'type' => '1', 'value' => '0'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_time' => array('name' => 'timestamp', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_time}', 'key' => '53a0dfa13892df377856c4852326c641', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dimoney%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => '0', 'fail' => '1'),
    ),

    # 口袋atm - 非回调模式
    # 产品列表:北京赛车PK10;PC蛋蛋;重庆时时彩
    'koudai_atm' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://main.adsoin.com/api/ios/sdk/IDFA_CHECK.php', 'type' => 'G'),
        'qc_params' => array(
            'need_bundle' => array('name' => 'bundleid', 'type' => '1', 'value' => 'com.happynews.mainios6'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => '0', 'fail' => '1'),

        'active' => array('url' => 'http://main.adsoin.com/api/ios/sdk/IDFA_CLICK.php', 'type' => 'G'),
        'active_params' => array(
            'need_bundle' => array('name' => 'bundleid', 'type' => '1', 'value' => 'com.happynews.mainios6'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_serverip' => array('name' => 'ip', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 'success', 'fail' => 'error'),
    ),

    # 应用猎人 - 非回调模式
    # 产品列表：借款钱包
    'apphunter' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://api1.jizhukeji.com/union/checkidfa', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => '12'),
            'need_appid' => array('name' => 'appiosid', 'type' => '1', 'value' => '353'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://api.jizhukeji.com/union/clickidfa', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => '12'),
            'need_appid' => array('name' => 'appiosid', 'type' => '1', 'value' => '353'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),

        'active' => array('url' => 'http://api.jizhukeji.com/union/activeidfa', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => '12'),
            'need_appid' => array('name' => 'appiosid', 'type' => '1', 'value' => '353'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),


    # 鼠宝 - 非回调模式
    # 产品列表：现货宝，牛呗借款, 少年侠客传
    'shubao' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://www.apptyk.com/data/pt-click', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '19638'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://www.apptyk.com/data/pt-report', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '19638'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),
    ),


    # 懒猫试玩 - 非回调模式
    # 产品列表：还呗
    'lanmao' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://qc.cattry.com/Home/Union/qc.html', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyuzq'),
            'need_appid' => array('name' => 'appiosid', 'type' => '1', 'value' => '2890'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://qc.cattry.com/Home/Union/click.html', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyuzq'),
            'need_appid' => array('name' => 'appiosid', 'type' => '1', 'value' => '2890'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),

        'active' => array('url' => 'http://qc.cattry.com/Home/Union/active.html', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyuzq'),
            'need_appid' => array('name' => 'appiosid', 'type' => '1', 'value' => '2890'),
            'need_keyword' => array('name' => 'keyword', 'type' => '2'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),


    # 有米友商 - 非回调模式
    # 产品列表：微医,快快优车
    'youmi' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://cp.api.youmi.net/midiapi/querya/', 'type' => 'P'),
        'qc_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '768033201'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'https://affiliate.youmi.net/ios/v1/recv', 'type' => 'G'),
        'click_params' => array(
            'need_appid' => array('name' => 's', 'type' => '1', 'value' => '42077eee2a9AyT8U25gsGrZzJ7gAWv8rVz0'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_json' => array('name' => 'goto', 'type' => '1', 'value' => '0'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_idfa' => array('name' => 'ifa', 'type' => '2'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'c', 'succ' => 0, 'fail' => 1),


        'active' => array('url' => 'http://af.api.youmi.net/ios/v1/recv_ifa', 'type' => 'G'),
            'active_params' => array(
                'need_appid' => array('name' => 's', 'type' => '1', 'value' => '8be68181bekk7DeK2g2pm83p5jGOSxH_BI3'),
                'need_time' => array('name' => 'timestamp', 'type' => '2'),
                'need_idfa' => array('name' => 'ifa', 'type' => '2'),
            ),
        'active_ret' => array('format' => 'json', 'field' => 'c', 'succ' => 0, 'fail' => -2221),
    ),

    # 龙域之星 - 回调模式
    'longyu_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://cp.api.youmi.net/midiapi/querya/', 'type' => 'P'),
        'qc_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '722265164'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'https://affiliate.youmi.net/ios/v1/recv', 'type' => 'G'),
        'active_params' => array(
            'need_appid' => array('name' => 's', 'type' => '1', 'value' => 'f942bd2f91suN__X2JMHFSQPllojHa1YzZw'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => ''),
            'need_ftm' => array('name' => 'goto', 'type' => '1', 'value' => '0'),
            'need_idfa' => array('name' => 'ifa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_callback' => array('name' => 'clickid', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'c', 'succ' => 0, 'fail' => -2221),
    ),

    # 有米友商 - 回调模式
    # 产品列表：51offer
    'youmi_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://cp.api.youmi.net/midiapi/querya/', 'type' => 'P'),
        'qc_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '978985106'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'https://affiliate.youmi.net/ios/v1/recv', 'type' => 'G'),
        'active_params' => array(
            'need_appid' => array('name' => 's', 'type' => '1', 'value' => 'a1f26404edaJfTCj244Xq7xkyPk3IVco9fL'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => ''),
            'need_ftm' => array('name' => 'goto', 'type' => '1', 'value' => '0'),
            'need_idfa' => array('name' => 'ifa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_callback' => array('name' => 'callback_url', 'type' => '3', 'value' => 'http%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dyoumi%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'c', 'succ' => 0, 'fail' => -2221),
    ),

    # 今日赚 - 上报模式
    # 产品列表：超爱财/任务花
    'jinrizhuan' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://api.jinrizhuanqian.cn/jinrizhuancooper/downstream_check_idfa', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'appleid', 'type' => '1', 'value' => '1088737488'),
            'need_check' => array('name' => 'check', 'type' => '1', 'value' => '1'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://api.jinrizhuanqian.cn/jinrizhuancooper/downstream_click_notice', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'appleid', 'type' => '1', 'value' => '1088737488'),
            'need_mac' => array('name' => 'check', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_callback' => array('name' => 'callbackurl', 'type' => '1', 'value' => ''),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 'true', 'fail' => 'false'),

        'active' => array('url' => 'http://api.jinrizhuanqian.cn/jinrizhuancooper/downstream_idfa_report_notice', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'appleid', 'type' => '1', 'value' => '1088737488'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 'true', 'fail' => 'false'),
    ),


    # 今日赚 - 回调模式
    # 产品列表：人人车二手车;优信新车
    'jinrizhuan_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://api.jinrizhuanqian.cn/jinrizhuancooper/downstream_check_idfa', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'appleid', 'type' => '1', 'value' => '1157616589'),
            'need_check' => array('name' => 'check', 'type' => '1', 'value' => '1'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://api.jinrizhuanqian.cn/jinrizhuancooper/downstream_click_notice', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'appleid', 'type' => '1', 'value' => '1157616589'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_os' => array('name' => 'os', 'type' => '1', 'value' => ''),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_callback' => array('name' => 'callbackurl', 'type' => '3', 'value' => 'http%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Djinrizhuan%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 'true', 'fail' => 'false'),
    ),


    # 今日赚 - 上报模式版本2
    # 产品列表：超爱财/任务花
    'jinrizhuan2' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://api.jinrizhuanqian.cn/check/channel_idfa_query', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'xiaoyuzhuanqian'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '66469f7d14956'),
            'need_check' => array('name' => 'check', 'type' => '1', 'value' => '1'),
            'need_idfa' => array('name' => 'idfas', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => 'data@{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://api.jinrizhuanqian.cn/click/channel_idfa_click', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'xiaoyuzhuanqian'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '66469f7d14956'),
            'need_keyword' => array('name' => 'keyword', 'type' => '1', 'value' => '无'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '020000000000'),
            'need_callback' => array('name' => 'callbackurl', 'type' => '1', 'value' => ''),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_os' => array('name' => 'os', 'type' => '2'),
            'need_os' => array('name' => 'os', 'type' => '2'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://api.jinrizhuanqian.cn/report/channel_idfa_report', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'xiaoyuzhuanqian'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '66469f7d14956'),
            'need_keyword' => array('name' => 'keyword', 'type' => '2'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_type' => array('name' => 'type', 'type' => '1', 'value' => 0),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => -1),
    ),

    # 今日赚 - 回调模式版本2
    # 产品列表：九秀直播 
    'jinrizhuan3' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://api.jinrizhuanqian.cn/check/channel_idfa_query', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'xiaoyuzhuanqian'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '1135ac8e22ebea'),
            'need_check' => array('name' => 'check', 'type' => '1', 'value' => '1'),
            'need_idfa' => array('name' => 'idfas', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => 'data@{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://api.jinrizhuanqian.cn/click/channel_idfa_click', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'xiaoyuzhuanqian'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '1135ac8e22ebea'),
            'need_keyword' => array('name' => 'keyword', 'type' => '2'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_os' => array('name' => 'os', 'type' => '1','value' => ''),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '020000000000'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_callback' => array('name' => 'callbackurl', 'type' => '3', 'value' => 'http%3A%2F%2Fyu.allfree.cc%2Findex%2Findex%2Factivecallback%2F%3Ft%3Djinrizhuan%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => -1),
    ),
    # 博睿 - 回调模式
    # 产品列表: 新氧
    'borui_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://123.57.85.254/sdkapi/idfa/check', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'ngbj688137161'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://182.254.220.167:12359/AdwanAPI/recv_click', 'type' => 'G'),
        'active_params' => array(
            'need_appid' => array('name' => 'ptid', 'type' => '1', 'value' => 'pt58cbbfed0ff5d'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dborui%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'success', 'succ' => 'true', 'fail' => 'false'),
    ),


    # 钱庄模板 - 非回调
    # 产品列表：三国的后裔,澳门百家乐,修仙记,网易考拉海购
    'qz_model1' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://api.appems.com/api/cop/idfaquery', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'ch', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '1584'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://api.appems.com/api/cop/idfaclick', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'ch', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '1584'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://api.appems.com/api/cop/idfaactive', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'ch', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '1584'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_keyword' => array('name' => 'kid', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1),
    ),

    # 钱庄模板 - 回调
    # 产品列表：叮当快药/每日优鲜/小花钱包/蜜芽
    'qz_model2' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://api.appems.com/api/cop/idfaquery', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'ch', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '1574'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://api.appems.com/api/cop/idfaclick', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'ch', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '1574'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dqianzhuang%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1),
    ),

    # 快感锁屏模板 - 非回调
    # 产品列表: 战鼓之魂
    'kuaigan_model1' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://ioswalladmin.chinazmob.com/admin/index.php/home/api/checkExistIdfa', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'adsid', 'type' => '1', 'value' => '2167'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://ioswalladmin.chinazmob.com/admin/index.php/home/api/index', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'adsid', 'type' => '1', 'value' => '2167'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_keyword' => array('name' => 'keyword', 'type' => '1', 'value' => ''),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '020000000000'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),

        'active' => array('url' => 'http://ioswalladmin.chinazmob.com/admin/index.php/home/api/active', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'adsid', 'type' => '1', 'value' => '2167'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2')
        ),
        'active_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),
    ),

    # 青绿模板 - 非回调
    # 产品列表: 大象保险
    'qinglv_model1' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://api.appletaba.com/iosad/check', 'type' => 'G'),
        'qc_params' => array(
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '1061'),
            'need_os' => array('name' => 'os', 'type' => '2'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://api.appletaba.com/iosad/click', 'type' => 'G'),
        'click_params' => array(
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '1061'),
            'need_os' => array('name' => 'os', 'type' => '2'),
            'need_dev' => array('name' => 'device', 'type' => '1', 'value' => ''),
            'need_keyword' => array('name' => 'keywords', 'type' => '1', 'value' => ''),
            'need_callback' => array('name' => 'callback', 'type' => '1', 'value' => ''),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 1, 'fail' => -1),

        'active' => array('url' => 'http://api.appletaba.com/iosad/active', 'type' => 'G'),
        'active_params' => array(
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '1061'),
            'need_os' => array('name' => 'os', 'type' => '2'),
            'need_dev' => array('name' => 'device', 'type' => '1', 'value' => ''),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 1, 'fail' => -1),
    ),

    //青绿 -- 回调
    //产品列表：51talk
    'qinglv_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://api.appletaba.com/iosad/check', 'type' => 'G'),
        'qc_params' => array(
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '1264'),
            'need_os' => array('name' => 'os', 'type' => '2'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://api.appletaba.com/iosad/click', 'type' => 'G'),
        'active_params' => array(
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '1264'),
            'need_os' => array('name' => 'os', 'type' => '2'),
            'need_keyword' => array('name' => 'keywords', 'type' => '1', 'value' => ''),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fyu.allfree.cc%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dqinglv%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 1, 'fail' => -1),
    ),

    # 熊猫试玩模板 - 非回调
    # 产品列表： wifi伴侣专业版,铃声大全
    'xiongmao_model1' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://shokey.shiwan123.com/experienceReward/api/alliance/filter', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1212220097'),
            'need_combine' => array('name' => 'combine', 'type' => '1', 'value' => '1'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://shokey.shiwan123.com/experienceReward/api/alliance/activate', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1212220097'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),

    # 熊猫试玩模板 - 回调
    # 产品列表： 百度地图
    'xiongmao_model2' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://shokey.shiwan123.com/experienceReward/api/alliance/filter', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '452186370'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://shokey.shiwan123.com/experienceReward/api/alliance/take', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '452186370'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_os' => array('name' => 'os', 'type' => '2'),
            'need_callback' => array('name' => 'callBackUrl', 'type' => '3', 'value' => 'http%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dxiongmaoshiwan%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),


    # 巨朋模板 - 非回调
    # 产品列表 : 更美, PopOn, 聚胜财富，聚胜财富Pro
    'jupeng_model1' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://wall.jpmob.com/wall/adjustidfa.do', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => 'id1182279600'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://wall.jpmob.com/wall/clickrd.jsp', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_redirect' => array('name' => 'redirect', 'type' => '1', 'value' => '0'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => 'id1182279600'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'clientip', 'type' => '2'),
            'need_keyword' => array('name' => 'clickKeyword', 'type' => '1', 'value' => ''),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),

        'active' => array('url' => 'http://wall.jpmob.com/wall/onActives.do', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyu'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => 'id1182279600'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'clientIp', 'type' => '2'),
            'need_keyword' => array('name' => 'activeKid', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'success', 'succ' => 'true', 'fail' => 'false'),
    ),

    # 微网通联系模板 - 回调
    # 产品列表： 未了财富;土豆视频;高德地图
    'weiwang_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://wezhuanba1.51welink.com/api/Welink/downstream_check_idfa', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'ChannelID', 'type' => '1', 'value' => 'xiaoyuzhuanqian'),
            'need_appid' => array('name' => 'AppleId', 'type' => '1', 'value' => '461703208'),
            'need_mac' => array('name' => 'MAC', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_idfa' => array('name' => 'IDFA', 'type' => '2'),
            'need_ip' => array('name' => 'IP', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => 'idfa', 'succ' => '0', 'fail' => '1'),

        'active' => array('url' => 'http://wezhuanba1.51welink.com/api/Welink/downstream_click_notice', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'ChannelID', 'type' => '1', 'value' => 'xiaoyuzhuanqian'),
            'need_appid' => array('name' => 'AppleId', 'type' => '1', 'value' => '461703208'),
            'need_mac' => array('name' => 'MAC', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_idfa' => array('name' => 'IDFA', 'type' => '2'),
            'need_ip' => array('name' => 'IP', 'type' => '2'),
            'need_callback' => array('name' => 'CallbackURL', 'type' => '3', 'value' => 'http%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dweiwangtl%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 'true', 'fail' => 'false'),
    ),

    # 微网通联模板 - 非回调
    # 产品列表 ： 梦想成真;法律移动课堂;建筑移动课堂
    'weiwang_model1' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://wezhuanba1.51welink.com/api/Welink/downstream_check_idfa', 'type' => 'G'),
        #下面是渠道自排重
        #'qc' => array('url' => 'http://wezhuanba1.51welink.com/api/Welink/check_idfa_inreportdata', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'ChannelID', 'type' => '1', 'value' => 'xiaoyuzhuanqian'),
            'need_appid' => array('name' => 'AppleId', 'type' => '1', 'value' => '717072508'),
            'need_mac' => array('name' => 'MAC', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_idfa' => array('name' => 'IDFA', 'type' => '2'),
            'need_ip' => array('name' => 'IP', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => 'idfa', 'succ' => '0', 'fail' => '1'),

        'click' => array('url' => 'http://wezhuanba1.51welink.com/api/Welink/downstream_click_notice', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'ChannelID', 'type' => '1', 'value' => 'xiaoyuzhuanqian'),
            'need_appid' => array('name' => 'AppleId', 'type' => '1', 'value' => '717072508'),
            'need_mac' => array('name' => 'MAC', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_idfa' => array('name' => 'IDFA', 'type' => '2'),
            'need_ip' => array('name' => 'IP', 'type' => '2'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 'true', 'fail' => 'false'),

        'active' => array('url' => 'http://wezhuanba1.51welink.com/api/Welink/downstream_report_notice', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'Source', 'type' => '1', 'value' => 'xiaoyuzhuanqian'),
            'need_appid' => array('name' => 'AppleId', 'type' => '1', 'value' => '717072508'),
            'need_mac' => array('name' => 'MAC', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_idfa' => array('name' => 'IDFA', 'type' => '2'),
            'need_ip' => array('name' => 'IP', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 'true', 'fail' => 'false'),
    ),
    # 微网通联模板 - 非回调
    # 产品列表 ： 先花一亿元
    'weiwang_model2' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,
        #下面是渠道自排重
        'qc' => array('url' => 'http://centralapi.51welink.com/api/Welink/check_idfa_inreportdata', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'ChannelID', 'type' => '1', 'value' => 'xiaoyuzhuanqian'),
            'need_appid' => array('name' => 'AppleId', 'type' => '1', 'value' => '986683563'),
            'need_mac' => array('name' => 'MAC', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_idfa' => array('name' => 'IDFA', 'type' => '2'),
            'need_ip' => array('name' => 'IP', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => 'idfa', 'succ' => '0', 'fail' => '1'),

        'click' => array('url' => 'http://centralapi.51welink.com/api/Welink/downstream_click_notice', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'ChannelID', 'type' => '1', 'value' => 'xiaoyuzhuanqian'),
            'need_appid' => array('name' => 'AppleId', 'type' => '1', 'value' => '986683563'),
            'need_mac' => array('name' => 'MAC', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_idfa' => array('name' => 'IDFA', 'type' => '2'),
            'need_ip' => array('name' => 'IP', 'type' => '2'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 'true', 'fail' => 'false'),

        'active' => array('url' => 'http://centralapi.51welink.com/api/Welink/downstream_report_notice', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'Source', 'type' => '1', 'value' => 'xiaoyuzhuanqian'),
            'need_appid' => array('name' => 'AppleId', 'type' => '1', 'value' => '986683563'),
            'need_mac' => array('name' => 'MAC', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_idfa' => array('name' => 'IDFA', 'type' => '2'),
            'need_ip' => array('name' => 'IP', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 'true', 'fail' => 'false'),
    ),
    

    # 咕咕鸟模板 - 回调
    'guguniao_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://api.playearn360.com/IOS/task/channel/dock/idfa/isRepeat.action', 'type' => 'G'),
        'qc_params' => array(
            'need_appid' => array('name' => 'apid', 'type' => '1', 'value' => 'nd1497855906287814r'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => 'idfa', 'succ' => 0, 'fail' => 2),

        'active' => array('url' => 'http://api.playearn360.com/IOS/task/channel/dock/task/click.action', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => '3816hm1470645891015d'),
            'need_appid' => array('name' => 'apid', 'type' => '1', 'value' => 'nd1497855906287814r'),
            'need_code' => array('name' => 'taskCode', 'type' => '1', 'value' => '3513nv1497858208824e'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dguguniao%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 200, 'fail' => 300),
    ),

    # 快友渠道 - 回调
    'kuaiyou_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://ent.coolad.cn/queryidfa/difidfa/fish', 'type' => 'P'),
        'qc_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1017591173'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => '0', 'fail' => '1'),

        'active' => array('url' => 'http://ent.coolad.cn/agent/clickad.do', 'type' => 'G'),
        'active_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => 'K30425699'),
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'H97249241'),
            'need_mac' => array('name' => 'mac', 'type' => '1', 'value' => '02:00:00:00:00:00'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_useragent' => array('name' => 'useragent', 'type' => '1', 'value' => ''),
            'need_skip' => array('name' => 'skip', 'type' => '1', 'value' => '0'),
            'need_udid' => array('name' => 'openudid', 'type' => '1', 'value' => ''),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_os' => array('name' => 'os', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dkuaiyou%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'res', 'succ' => 1, 'fail' => 0),
    ),

    # 合众 - 回调
    # 智联卓聘
    'hezhong' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://api.appspread.cn/api/api.php', 'type' => 'G'),
        'qc_params' => array(
            'need_act' => array('name' => 'act', 'type' => '1', 'value' => 'checkidfa'),
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'niaoge'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1059303021'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_time' => array('name' => 'timestamp', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_time}', 'key' => 'yf329^$#(&H5d~!d,.(*0', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => '0', 'fail' => '1'),

        'active' => array('url' => 'http://api.appspread.cn/api/api.php', 'type' => 'G'),
        'active_params' => array(
            'need_act' => array('name' => 'act', 'type' => '1', 'value' => 'clickidfa'),
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'niaoge'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1059303021'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_time' => array('name' => 'timestamp', 'type' => '2'),
            'need_os' => array('name' => 'system_version', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_time}', 'key' => 'yf329^$#(&H5d~!d,.(*0', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fwww.xiaoyuzhuanqian.com%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dhezhong%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'result', 'succ' => '1', 'fail' => '0'),
    ),

    # 凡卓 - 非回调
    'fanzhuo' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://dedup.x.foozo.cn/distinct/multiple', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'pid', 'type' => '1', 'value' => '24'),
            'need_appid' => array('name' => 'apple_id', 'type' => '1', 'value' => '494776019'),
            'need_idfa' => array('name' => 'idfas', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => 'data@idfas@{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://x.foozo.cn/track/click', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'pid', 'type' => '1', 'value' => '24'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '700110'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
            'need_time' => array('name' => 'click_time', 'type' => '2'),
        ),
        'click_ret' => array('format' => 'json', 'field' => 'errno', 'succ' => 0, 'fail' => 1),
    ),

    #隆驰兴潤
    'chilongxingrun' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://apiyoumi.kdatm.com/show/query/idfa_check.php', 'type' => 'G'),
        'qc_params' => array(
            'need_bid' => array('name' => 'bid', 'type' => '1', 'value' => 'com.rgbvr.happywawa'),
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xyzq'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '10102'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => '0', 'fail' => '1'),

        'active' => array('url' => 'http://apiyoumi.kdatm.com/show/query/click_check.php', 'type' => 'G'),
        'active_params' => array(
            'need_bid' => array('name' => 'bid', 'type' => '1', 'value' => 'com.rgbvr.happywawa'),
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xyzq'),
            'need_appid' => array('name' => 'adid', 'type' => '1', 'value' => '10102'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => '0', 'fail' => '1')
    ),

    //美妆相机积分墙
    //快手
    'meinvxiangji' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://120.77.232.212/query/mzxj', 'type' => 'G'),
        'qc_params' => array(
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => 'result@{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://120.77.232.212:8063/sclick', 'type' => 'G'),
        'active_params' => array(
            'need_devid' => array('name' => 'devid', 'type' => '1', 'value' => '27'),
            'need_cuid' => array('name' => 'cuid', 'type' => '1', 'value' => '39'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 0, 'fail' => 1),
    ),

    //试用宝--上报
    'shiyongbao' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://www.shiyongapp.com/idfa/check', 'type' => 'G'),
        'qc_params' => array(
            'need_app_key' => array('name' => 'app_key', 'type' => '1', 'value' => 'xiaoyu'),
            'need_app_secret' => array('name' => 'app_secret', 'type' => '1', 'value' => 'a8989ab067a6fdb038fb1e9f1d3092d6'),
            'need_appid' => array('name' => 'app_id', 'type' => '1', 'value' => '1274971621'),
            'need_keyword' => array('name' => 'keyword', 'type' => '2'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2')
        ),
        'qc_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://www.shiyongapp.com/idfa/report', 'type' => 'G'),
        'active_params' => array(
            'need_app_key' => array('name' => 'app_key', 'type' => '1', 'value' => 'xiaoyu'),
            'need_app_secret' => array('name' => 'app_secret', 'type' => '1', 'value' => 'a8989ab067a6fdb038fb1e9f1d3092d6'),
            'need_appid' => array('name' => 'app_id', 'type' => '1', 'value' => '1274971621'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2')
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 0, 'fail' => 1)
    ),

    //试用宝--回调
    'shiyongbao_cb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'https://web.shanliaoapp.com/xiaoyu_channel/distinct', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'XIAOYU'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => 'afe6c53f1f7bf0e7b8611bdc345cd85684219f4d'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'https://web.shanliaoapp.com/xiaoyu_channel/notify', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'XIAOYU'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => 'afe6c53f1f7bf0e7b8611bdc345cd85684219f4d'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fyu.allfree.cc%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dshanliao%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),

    //零花钱
    //快手
    'linghuaqian' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://101.200.129.217/api/queryIdfa.php', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'chanid', 'type' => '1', 'value' => '1248'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1853'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2')
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => '0', 'fail' => '1'),

        'active' => array('url' => 'http://101.200.129.217/api/channel_active_api.php', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'chanid', 'type' => '1', 'value' => '1248'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1853'),
            'need_mac   ' => array('name' => 'mac', 'type' => '1', 'value' => ''),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false)
    ),

    //研测-8669 -- 回调
    //西游记之大圣归来
    'yance' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://other.sdk.kpzs.com/GameAd/AdActivate/CheckInstall/1142/10001', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'appstore'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '10142003'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2')
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://other.sdk.kpzs.com/GameAd/AdActivate/Report/1142/10001', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'appstore'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '10142003'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fyu.allfree.cc%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dyance%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),

    //卓森(金鑫) -- 上报
    //神仙挂机大乱斗
    'zhuosen' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://111.230.78.86:8080/interface/distinct', 'type' => 'G'),
        'qc_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1317199502'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2')
        ),
        'qc_ret' => array('format' => 'json', 'field' => 'result@{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://111.230.78.86:8080/interface/active', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyuzq'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1317199502'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_src}|{need_appid}|{need_idfa}|', 'key' => 'mpnmiepjko5yd8hkjbo7ahvz34xqagy3', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'err_code', 'succ' => 0, 'fail' => 1),
    ),

    //卓森   懒猫外放回调(xiaoyuzq--健康160-挂号问诊购药健康管理平台)
    //链接地址：https://itunes.apple.com/cn/app/id593811445?mt=8
    'zhuosencb' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://qc.cattry.com/Home/Union/qc.html', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyuzq'),
            'need_appid' => array('name' => 'appiosid', 'type' => '1', 'value' => '6279'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2')
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://qc.cattry.com/Home/Union/click.html', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyuzq'),
            'need_appid' => array('name' => 'appiosid', 'type' => '1', 'value' => '6279'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fyu.allfree.cc%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dzhuosencb%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),

    //好爸爸   回调
    'goodfather' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,

        'qc' => array('url' => 'http://www.goodfatherapp.com/idfa/distinct', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'smallFish'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => 'com.goodfather.PEP-Chinese'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2')
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://www.goodfatherapp.com/idfa/sfNotify', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'smallFish'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => 'com.goodfather.PEP-Chinese'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fyu.allfree.cc%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dgoodfather%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),


    //蝉大师 -- 激活上报
    'chandashi' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://shike.ddashi.com/shike/repeatnew.php', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'qingmo'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1228543025'),
            'need_key' => array('name' => 'key', 'type' => '1', 'value' => 'cWluZ21v'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2')
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://shike.ddashi.com/shike/confirm.php', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'qingmo'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1228543025'),
            'need_key' => array('name' => 'key', 'type' => '1', 'value' => 'cWluZ21v'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2')
        ),
        'active_ret' => array('format' => 'json', 'field' => 'success', 'succ' => true, 'fail' => false),
    ),
    //钱快来 -- 激活上报
    'qiankuailai' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://xdan.peate.vip:8089/out/dub_repeat', 'type' => 'G'),
        'qc_params' => array(
            'need_appid' => array('name' => 'app_id', 'type' => '1', 'value' => '2'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'client_ip', 'type' => '2')
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),

        'active' => array('url' => 'http://xdan.peate.vip:8089/out/active', 'type' => 'G'),
        'active_params' => array(
            'need_appid' => array('name' => 'app_id', 'type' => '1', 'value' => '2'),
            'need_ip' => array('name' => 'client_ip', 'type' => '2'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2')
        ),
        'active_ret' => array('format' => 'json', 'field' => 'code', 'succ' => 1, 'fail' => 0),
    ),

    //闪客蜂 -- 激活上报
    '闪客蜂' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://120.52.139.109:8280/wallet/ad/idfaRepeat', 'type' => 'G'),
        'qc_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => '15882356'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1057875287'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
        ),
        'qc_ret' => array('format' => 'json', 'field' => 'resultCode', 'succ' => 1, 'fail' => 0),

        'active' => array('url' => 'http://120.52.139.109:8280/wallet/ad/clickInfo', 'type' => 'G'),
        'active_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => '1057875287'),
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => '15882356'),
            'need_idfa' => array('name' => 'idfa', 'type' => '2')
        ),
        'active_ret' => array('format' => 'json', 'field' => 'resultCode', 'succ' => 1, 'fail' => 0),
    ),




    //掌贝 -- 激活上报
    //网易新闻
    'zhangbei' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://www.didazhuan.cn/channelcheck.php', 'type' => 'G'),
        'qc_params' => array(
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => 'wyxwyd_xy'),
            'need_os' => array('name' => 'os', 'type' => '1', 'value' => ''),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2')
        ),
        'qc_ret' => array('format' => 'text', 'succ' => '0|未激活', 'fail' => '1|已激活'),

        'click' => array('url' => 'http://www.didazhuan.cn/channelclick.php', 'type' => 'G'),
        'click_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyuzq'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => 'wyxwyd_xy'),
            'need_os' => array('name' => 'os', 'type' => '1', 'value' => ''),
            'need_keyword' => array('name' => 'keyword', 'type' => '1', 'value' => ''),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2')
        ),
        'click_ret' => array('format' => 'text', 'succ' => '1|成功', 'fail' => '0|失败'),

        'active' => array('url' => 'http://www.didazhuan.cn/channelreport.php', 'type' => 'G'),
        'active_params' => array(
            'need_src' => array('name' => 'source', 'type' => '1', 'value' => 'xiaoyuzq'),
            'need_appid' => array('name' => 'appid', 'type' => '1', 'value' => 'wyxwyd_xy'),
            'need_os' => array('name' => 'os', 'type' => '1', 'value' => ''),
            'need_keyword' => array('name' => 'keyword', 'type' => '1', 'value' => ''),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2')
        ),
        'active_ret' => array('format' => 'text', 'succ' => '1|激活成功', 'fail' => '0|激活失败'),
    ),


   //钱脉 -- 非回调模式(syy添加)
    //红黑对决
    'qianmai' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 0,

        'qc' => array('url' => 'http://api.plat.qianmaiap.com/distinct', 'type' => 'G'),
        'qc_params' => array(
            'need_appid' => array('name' => 'sourceid', 'type' => '1', 'value' => '600716'), //渠道ID
            'need_adid' => array('name' => 'adid', 'type' => '1', 'value' => '70834'), //广告ID
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2')
        ),
        'qc_ret' => array('format' => 'json','field'=>'{need_idfa}', 'succ' => 0, 'fail' => 1),

        'click' => array('url' => 'http://api.plat.qianmaiap.com/click', 'type' => 'G'),
        'click_params' => array(
            'need_appid' => array('name' => 'sourceid', 'type' => '1', 'value' => '600716'), //渠道ID
            'need_adid' => array('name' => 'adid', 'type' => '1', 'value' => '70834'), //广告ID
            'need_keyword' => array('name' => 'keyword', 'type' => '1', 'value' => ''),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2')
        ),
        'click_ret' => array('format' => 'json','field' => 'State', 'succ' => 100, 'fail' => 102),

        'active' => array('url' => 'http://api.plat.qianmaiap.com/activate', 'type' => 'G'),
        'active_params' => array(
            'need_appid' => array('name' => 'sourceid', 'type' => '1', 'value' => '600716'), //渠道ID
            'need_adid' => array('name' => 'adid', 'type' => '1', 'value' => '70834'), //广告ID
            'need_keyword' => array('name' => 'keyword', 'type' => '1', 'value' => ''),
            'need_idfa' => array('name' => 'idfa', 'type' => '2'),
            'need_ip' => array('name' => 'ip', 'type' => '2')
        ),
        'active_ret' => array('format' => 'json','field' => 'State', 'succ' => 100, 'fail' => 102),
    ),
    //我爱我家  -- 回调模式(syy添加)
    'woaiwojia' => array(
        'newest' => 1,
        'channel' => 'Join_GeneralModel',
        'model' => 1,
        'qc' => array('url' => 'https://bj.5i5j.com/advert/advertcheck/', 'type' => 'P'),
        'qc_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'xiaoyu'),
            'need_os' => array('name' => 'os', 'type' => '1', 'value' => '1'),
            'need_idfa' => array('name' => 'uniqueid', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_idfa}{need_src}', 'key' => 'H9hKgfVV6SiDoE6h', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
        ),
        'qc_ret' => array('format' => 'json', 'field' => '{need_idfa}', 'succ' => 0, 'fail' => 1),
        'active' => array('url' => 'https://bj.5i5j.com/advert/advertsave/', 'type' => 'P'),
        'active_params' => array(
            'need_src' => array('name' => 'channel', 'type' => '1', 'value' => 'xiaoyu'),
            'need_os' => array('name' => 'os', 'type' => '1', 'value' => '1'),
            'need_idfa' => array('name' => 'uniqueid', 'type' => '2'),
            'need_sign' => array('name' => 'sign', 'type' => '3', 'value' => '{need_idfa}{need_src}', 'key' => 'H9hKgfVV6SiDoE6h', 'func' => 'Join_BaseApiModel::md5Sign', 'pos' => 2),
            'need_callback' => array('name' => 'callback', 'type' => '3', 'value' => 'http%3A%2F%2Fyu.allfree.cc%2Findex%2Findex%2Factivecallback%2F%3Ft%3Dwoaiwojia%26id%3D'),
        ),
        'active_ret' => array('format' => 'json', 'field' => 'status', 'succ' => 1, 'fail' => 0),
    ),





     # 小米小贷
    31 => array(
        'channel' => 'mixiaodai',

        'private_key' => '-----BEGIN PRIVATE KEY-----
MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBAOQ64CXpMsJK9Zgz
mrxm+J/eFCLVj2m4YVoiKVDFG+1mjoj+5VP6BBcW2bUPh5ExtZ9Y13dPmehAqNKp
ZXv1ffANtuuUKl0LCGu3k4gJT8Su+8hKID4jFFLjLWIDBRgPTzlwAxZkoRoJPD2M
3B/sqM/lRzUr/jItv7TUtX3BzySRAgMBAAECgYBreOIGWCrj3UKLWnmaEG8xcPVQ
dfpjkUSemgmUlE0TXMDv9//rrIbyjHsWTOrMz3i0QbSs5VoXSSN2l/hHCBI17ckK
5sIIHZTa7XQ9JBiiiOSlc9H5eDmsCTU4yOo7R73jeSv0fwNjapT5dnPQU/e0TOyI
mwFrPoDXoJi9jAUkJQJBAPInrTffAvMH1xpdSKI0KavXRH6NjeYnbcM1hkzOOUoL
rAuR17GJcKfUcNddxIEKZVMktdFwQ3UUGzFK0o70n9sCQQDxR2Jlk8mE1hilrhN3
4fkeG+jm+hx/bWLsaTiotaMA4WjI7XX83PX4irbKEmNJPjSlfS1GpUX2l/0z5GRm
jV8DAkBedgXHHrKK1UsemLcFty1uQCoS5+srlcPme1GpUmTcspLpbHnkYoXUojVm
fchywfhmp5JZYd6epDo7T0G1zE0zAkEAs0vFvhAlt3XV2QDT7Mla81nwJ/yCwtrJ
oT7L4OshV10qHe4AOMkGbAzAqschSuNUAgpUY+QbapUljrNRPLgfewJBAIrrlvzC
YT+pbJnrp6brZD3z8UjmKN7g8W+HpmM9wrIakLf1Dlo6ckgehz3GRXFw00EtELHM
759KzPt2uTZOJgA=
-----END PRIVATE KEY-----',

        'qc' => '/v1/market/welink/status',
        'active' => '/v1/market/welink/notify',
        'need_callback' => 'http://yu.allfree.cc/index/index/activecallback/?t=mixiaodai&id=',
        'partnerId' => 18,
        'base_url' => 'https://api.jr.mi.com',
    ),
);

?>