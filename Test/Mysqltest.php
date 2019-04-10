<?php
echo '<pre>';
$conn = mysqli_connect('127.0.0.1','root','123456','mytable');
/*if(!$conn){
     die('error'.mysqli_error($conn));

}
        $uid = $_POST['id'];
        $sql = "select id from testcpl where id = '${uid}'";
        $msq = mysqli_query($conn,$sql);
        //printf("返回%b行",$row);
        if(mysqli_num_rows($msq)>0){
            echo '已存在';
        }
        else{
            echo '未存在';
        }*/
$sql = "select * from testcpl";
$res = mysqli_query($conn,$sql);
/*$ress = mysqli_fetch_all($res);//取出所有
foreach ($ress as $k){
    print_r($k);
}*/
$data = $res->fetch_assoc();
var_export($data);
echo '<hr>';
var_dump($data);
$res->close();
echo '</pre>';

?>