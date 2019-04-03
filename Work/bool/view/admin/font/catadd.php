<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/1/28
 * Time: 下午2:37
 */

if(!empty($_POST)) {
    $conn = new mysqli('127.0.0.1', 'root', '123456', 'blog');
    mysqli_query($conn , "set names utf8");
    if ($conn->connect_errno) {
        dei("链接失败" . $conn->connect_errno);
    } else {
        $cat['catname'] = trim($_POST['catname']);
        //print_r($cat);
        if (empty($cat['catname'])) {
            echo 'NULL';
            exit;

        } else {
            //$sql = "select * from cat";
            //$res = mysqli_query($conn, $sql);
            //$result = mysqli_fetch_array($res);
            //print_r($result);
            $sqlselect = "select count(*) from cat where catname = '$cat[catname]'";
            $rs = mysqli_query($conn, $sqlselect);
            //print_r($rs);
            //print_r(mysqli_fetch_assoc($rs));
            if(mysqli_fetch_assoc($rs)['count(*)']!=0){
                echo 'exits';
                exit;
            }
            $insertsql = "INSERT into cat (catname) values ('$cat[catname]')";
            if(!mysqli_query($conn,$insertsql)){
                echo '插入失败'.mysqli_error($conn);
                exit;
            }
            else{
                echo '插入成功';
            }
        }

    }
}
