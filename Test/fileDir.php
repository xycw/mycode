<?php
$imgname = $_FILES['myfile']['name'];
$tmp = $_FILES['myfile']['tmp_name'];
$filepath = '/Users/niaogebiji/PhpstormProjects/untitled1/photo/';

//var_dump($filepath);
print_r($_FILES['myfile']['name']);
if(move_uploaded_file($tmp,$filepath.$imgname.".png")){
    echo "上传成功";
}else{
    echo "上传失败";
}
?>
