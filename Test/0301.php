<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/3/1
 * Time: 上午11:37
 */
echo '<pre>';
//header('Location: http://www.baidu.com/');
$curtime = 'user';
$upd_data = $curtime;
print_r($upd_data);
$arr = array(
    'hello'=>$upd_data
);
print_r($arr);
function echo_message($msg = 'success', $code = 200, $data = array())
{
    $msg = str_replace('_', ' ', $msg);
    $msg = strtoupper($msg);
    $err_arr['return_code'] = strval($code);
    $err_arr['return_msg'] = $msg;
    $err_arr['return_data'] = $data;
    print_r($err_arr);
    echo json_encode($err_arr);
}
echo_message('_test',200);

echo '<br>';
$award_price = 1;
$award_memo = "2";
$add_exchange = array(
    'money' => $award_price,
    'memo' => $award_memo,
    'data_id' => $params['gaoe_id']
);
print_r($add_exchange);
echo '<br>';
echo json_encode(array('success' => true, 'msg' => 'success'), true);
$i = 100;
$data['data'] = $i;
print_r($data['data']);
echo json_encode($data);
$index['position'] = 201;
print_r($index);
echo '</pre>';
?>





