<?php
//1、创建一个真空彩色图像
$image = imagecreatetruecolor(100,30);
//2、为图像分配颜色
$bgcolor = imagecolorallocate($image,255,255,255);
//3、填充图像
imagefill($image,0,0,$bgcolor);
//4、在图像中添加随机数字
for($i=0;$i<4;$i++){
    $fontsize=6;
    $fontcolor = imagecolorallocate($image,rand(0,120),rand(0,120),rand(0,120));
    $fontcontent = rand(0,9);

    $x = ($i*100/4)+rand(5,10);
    $y = rand(5,10);
    imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
}
//增加干扰元素
for($i=0;$i<200;$i++){
    $pointcolor = imagecolorallocate($image,rand(50,200),rand(50,200),rand(50,200));
    imagesetpixel($image,rand(1,99),rand(1,99),rand(1,99));
}
//增加线干扰
for($i=0;$i<3;$i++){
    $linecolor = imagecolorallocate($image,rand(80,200),rand(80,200),rand(80,200));
    imageline($image,rand(1,99),rand(1,29),rand(1,99),rand(1,29),$linecolor);
}
header('content-type:image/png');
imagepng($image);
imagedestroy($image);
?>