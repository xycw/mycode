
<?php
/**
|发布新闻
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>新闻管理</title>
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
        <h3>update</h3>
<form action="action.php?action=update" method="post">
    <input type="hidden" name="id" value=""/>
    <table width="320" border="0">
        <tr>
            <td align="right">标题:</td>
            <td><input type="text" name="title" value=""/></td>
        </tr>
        <tr>
            <td align="right">关键词:</td>
            <td><input type="text" name="keywords" value=""/></td>
        </tr>
        <tr>
            <td align="right">作者</td>
            <td><input type="text" name="author" value=""/></td>
        </tr>
        <tr>
            <td align="right" valign="top">内容</td>
            <td><textarea cols="25" rows="5" name="content"></textarea></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="编辑"/>&nbsp;&nbsp;
                <input type="reset" value="重置"/>
            </td>
        </tr>
    </table>
</form>
</html>
