<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/4/2
 * Time: 下午3:16
 * 设置数据库账号密码调用
 */

require ("mysqldb.php");

class mysqlexcel
{


    public $conn = null;
    public $host;
    public $username;
    public $password;
    public $dbname;
    public function __construct()
    {
        $this->host = '127.0.0.1';
        $this->username = 'root';
        $this->password = '123456';
        $this->dbname = 'mytable';
        $this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->dbname) or die(mysqli_error());
    }
    public function getResult($sql){
        $resouce = mysqli_query($this->conn,$sql) or die(mysqli_error());
        $resout = mysqli_fetch_all($resouce);
        $res = array();
        foreach ($resout as $row){
            $res[] = $row;
        }
        return $res;
    }
}