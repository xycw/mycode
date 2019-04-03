<?php
    class eng{
        public $a = 'a';
        protected $b = 'b';
        private $c = 'c';

        public function test1()
        {
            echo 'test1';
        }
        protected function test2(){
            echo 'test2';
        }
        private function test3(){
            echo 'test3';
        }
    }

    class A extends eng{
        function show(){
            $this->a;
        }
    }
    class B extends eng{

    }
    $e1 = new eng();
    $e1->test1()."<br>";
    //$e1->show();

class father{
    public function a(){
        echo "function a<br/>";
    }
    private function b(){
        echo "function b<br/>";
    }
    protected function c(){
        echo "function c<br/>";
    }
}
//子类
class child extends father{
    function d(){
        parent::a();//调用父类的a方法
    }
    function e(){
        parent::c(); //调用父类的c方法
    }
    /*function f(){
        parent::b(); //调用父类的b方法
    }*/
}
$father=new father();
$father->a();
// $father->b(); //显示错误 外部无法调用私有的方法 Call to protected method father::b()
// $father->c(); //显示错误 外部无法调用受保护的方法Call to private method father::c()
$chlid=new child();
$chlid->d();
$chlid->e();
// $chlid->f();