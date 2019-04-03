<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/3/5
 * Time: 上午10:49
 */
/*class test1 {
    protected $name = null;
    public function init1($name){
        $this->name = '11111';
        $this->name = $name;
    }
}
 $t1 = new test1();
$t1->init1();
echo $t1;*/
function fo(&$a){
    $a++;
    echo 'fo内'.$a.'<br>';
}
$a = 5;
echo $a.'<br>';
fo($a);
echo 'fo外'.$a;
echo '<br>';
$pro_arr = array(array('price'=>10,'count'=>100),
                array('price'=>20,'count'=>90),
);
foreach ($pro_arr as $key=>$value) {
    $pro_arr[$key]['total'] = $value['price']*$value['count'];
}
echo '<pre>';
print_r($pro_arr);
foreach($pro_arr as $key=>&$value){
    $value['total']=$value['price']*$value['count'];
}
print_r($pro_arr);
echo '<br>';

$data['dyna_list'] = array(
    array(
        "id" => "120",
        "title" => "关于严惩作弊行为的公告",
        "type" => 1,
        "sub_type" => "6",
        "is_read" => "1",
    ),
    array(
        "id" => "121",
        "title" => "关于小鸟星球 App Store下载的通知",
        "type" => 1,
        "sub_type" => "6",
        "is_read" => "1",
    )
);
//print_r($data);
foreach ($data as $keyd=>$vald){
        print_r($keyd);
}
echo '<br>';
function getUserDevices($account)
{
    $params = array();
    $params['account'] = $account;
    $params['facid'] = "1075";
    $params['action'] = 'getDeviceList';
    return $params;
}
print_r(getUserDevices(100));
echo '<br>';
$return_data['devices'] = array('devices'=>01,'device_id'=>10001);
foreach ($return_data as $key1=>$val){
        echo '<br>'.'71';
        print_r($key1);
        print_r($return_data['devices'][$key1]['device_id']);
}
$result[] = array('devices'=>99911,'device_id'=>99999);
foreach ($result as $key => $row) {
    //$return_data['devices'][$key]['device_id'] = $row['device_id'];
}
$arr['name'] = array('age'=>10,array('age2'=>12));

//ar_dump($arr);
echo '</pre>';
?>


