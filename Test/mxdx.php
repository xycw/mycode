<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2018/10/12
 * Time: 上午10:19
 */

class person{
    public $name;
    private $age;
    private $salary;

    function __construct($name,$age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function getAge($age)
    {


            return $this->age;

    }

    public function setAge($age)
    {
        if($age>1&&$age<100){

            $this->age = $age;
        }
        echo '年龄有误';
    }

}
    $p1 = new person('zhangfei','1000');

    echo $p1->name;
    echo $p1->setAge();
    echo $p1->getAge();


?>