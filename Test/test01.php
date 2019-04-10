<?php
/*header('content-type:text/html;charset=utf8');
//连接数据库
$dsn="mysql:dbname=mytable;host=127.0.0.1";
//数据库的用户名
$user="root";
//数据库的密码
$password="123456";*/
//生成PDO对象
//$object = startpdo();
//$object = new PDO($dsn,$user,$password);

/*$sql="select id from test01";
$result = $object->query($sql);
while($arr=$result->fetch()){
    //print_r($arr);
}*/
$key ='25668c2e7aefe70e197df9d8311fb1bb';
$playerid =1385333;
$channel ='wlddz413';
$data = array(
    'channel' => 'wlddz413',
    'uid' => 1385333,
    'sign' => md5($playerid.$channel.$key),
);
$url = 'http://api-wlddz.91cb.com/NewCpl/wingold'. '?' . http_build_query($data);
echo $url;
?>
