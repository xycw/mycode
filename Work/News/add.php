
<?php
/**
|发布新闻
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="http://www.francescomalagrino.com/BootstrapPageGenerator/3/js/jquery-2.0.0.min.js"></script>
    <script type="text/javascript" src="http://www.francescomalagrino.com/BootstrapPageGenerator/3/js/jquery-ui"></script>
    <link href="http://www.francescomalagrino.com/BootstrapPageGenerator/3/css/bootstrap-combined.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="http://www.francescomalagrino.com/BootstrapPageGenerator/3/js/bootstrap.min.js">
    </script>
    <script>
        //function ck() {
        if(confirm("是否删除")){
            alert("删除成功");
            window.location.href="test.php";
        }
        else{
            //alert('ok');
        }
        }
    </script>
</head>
<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">
            </div>
            <div class="hero-unit">
                <h2 align="center" colspan="4">
                    Life had a lot of things is futile, but we still want to experience!
                </h2>
                <p>
                    <!--<a rel="nofollow" class="btn btn-primary btn-large" href="#">参看更多 »</a>-->
                </p>
            </div>
            <table class="table">
                <thead>
                </thead>
                <tbody>
                <tr class="success">

                    <td>
                        <input  type="button" class="btn btn-primary btn-lg" onclick="ck()"name="delete" value="浏览"/>
                    </td>
                    <td>
                        <input type="button" class="btn btn-primary btn-lg" onclick="ck()"name="delete" value="发布"/>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
<h3>发布</h3>
<form action="action.php?action=add" method="post">
    <fieldset>
        <label>标题</label><input type="text" name="title" required />
        <label>关键字</label><input type="text" name="keywords" required />
        <label>作者</label><input type="text" name="author" required />
        <label>内容</label><textarea name="content" rows="5" cols="30" name ="content" required></textarea>
        <hr>
        <input type="submit" class="btn btn-primary btn-lg" name="pubMsg" value="发布留言"/>
        <input type="reset" class="btn btn-primary btn-lg" name="pubMsg" value="重置"/>
    </fieldset>
</form>
</body>
</html>
