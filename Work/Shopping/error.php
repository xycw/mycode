<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2018/11/3
 * Time: 上午10:00
 */
    echo '登录密码错误';



//url type参数处理 1:操作成功 2:操作失败
$type = isset($_GET['type']) && in_array(intval($_GET['type']), array(1, 2)) ? intval($_GET['type']) : 1;

$title = $type == 1 ? '操作成功' : '操作失败';

$msg = isset($_GET['msg']) ? trim($_GET['msg']) : '用户密码或账号错误';

$url = isset($_GET['url']) ? trim($_GET['url']) : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="./static/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="./static/css/done.css"/>
</head>
<body>
<div class="header">
    <div class="logo f1">
        <img src="./static/image/logo.png">
    </div>
</div>
<div class="content">
    <div class="center">
        <div class="image_center">
        <?php
        echo "<a href='loggin.php'>重新登录</a>";
        ?>
            <?php if($type == 1): ?>
                <span class="smile_face">:)</span>
            <?php else: ?>
                <span class="smile_face">:(</span>
            <?php endif; ?>

        </div>
        <div class="code">
            <?php echo $msg ?>
        </div>
        <div class="jump">
            页面在 <strong id="time" style="color: #009f95">3</strong> 秒 后跳转
        </div>
    </div>

</div>
<div class="footer">
    <p><span>M-GALLARY</span>©2017 POWERED BY IMOOC.INC</p>
</div>
</body>
<script src="./static/js/jquery-1.10.2.min.js"></script>
<script>
    $(function () {
        var time = 100;
        var url = "<?php echo $url?>" || null;//js读取php变量
        setInterval(function () {
            if (time > 1) {
                time--;
                console.log(time);
                $('#time').html(time);
            }
            else {
                $('#time').html(0);
                if (url) {
                    location.href = url;
                } else {
                    history.go(-1);
                }

            }
        }, 1000);

    })
</script>
</html>
