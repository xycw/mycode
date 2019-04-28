<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/3/5
 * Time: 上午10:47
 */
class UserModel1{
    function __construct()
    {
        echo 'bign';
    }

    public function test1(){
        echo 'test1';
    }
    public function test2(){
        echo 'test2';

    }

}
class UserModel2 extends UserModel1{
    public function test3()
    {
        echo 'UserModel2test3';
    }
}
$user2 = new UserModel2();
$user2->test2();
