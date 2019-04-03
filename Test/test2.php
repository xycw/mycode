<?php
class ttt
{

    public function g($params)
    {
        $params = 0;
        return $params;
    }

    public function c($params)
    {


        $apply_info = $this->g($params['id']);
        echo $apply_info;
        /*if(empty($apply_info)){
            return array(false, '您未领取此应用');
        }

        if(intval($apply_info['status']) === 0){
            //$this->deleteDataByUidATid($params);
        }
    }*/
    }


}
$apply_info['asd'];
print_r($apply_info);

$i =5;
$i+=5;
echo '$i = '.$i;

var_dump(define('DEFINE_VAR1',1<<1));
echo '<br>';
$age=array("Peter"=>" ","Ben"=>"37","Joe"=>"43");
echo "Peter is " . $age['Peter'] . " years old.".'<br>';
$a = 1;
$b = 20;
$a = $b;
echo $a;

?>