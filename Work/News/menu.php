
<?php
/**
|公共导航栏
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
    </script type="text/css">
    <style>
        td{
            text-align: center;
        }
    </style>
</head>

<body>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="page-header">

            </div>
            <div class="hero-unit">
                <h2 align="center" colspan="4">
                    新  闻  管  理
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
                        <input id="liulang" type="button" class="btn btn-primary btn-lg" onclick="ck()"name="delete" value="浏览"/>
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
</body>
</html>
