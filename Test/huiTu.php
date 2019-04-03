<?php
class demo {
    private static $MyObject; //保存对象的静态属性
    private function __construct(){ //私有化构造函数
    }
    private function __clone(){ //禁止克隆
    }
    public static function getInstance(){
        if(! (self::$MyObject instanceof self)){
            self::$MyObject = new self;
        }
        return self::$MyObject;
    }
}
?>