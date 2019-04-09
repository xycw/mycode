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
$idfa ='b1c2af4adf94103d73da2245856bd606';
$playerid =1039130;
$channel =63;
$data = array(
    'channel' => 63,
    'uid' => 1039130,
    'sign' => md5($playerid.$channel.$idfa),
);
$url = 'https://api-hpmj.734399.com/Cpl/wingold'. '?' . http_build_query($data);
echo $url;
?>
