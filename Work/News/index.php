
<?php
/**
查看新闻
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
    <script type="text/javascript">
        function dodel(id) {
            if(confirm("是否删除")){
                window.location="action.php?action=del&id="+id;
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
                    select
                </h2>
                <p>
                    <!--<a rel="nofollow" class="btn btn-primary btn-large" href="#">参看更多 »</a>-->
                </p>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>
                        新闻编号
                    </th>
                    <th>
                        新闻标题
                    </th>
                    <th>
                        关键词
                    </th>
                    <th>
                        新闻作者
                    </th>
                    <th>
                        发布时间
                    </th>
                    <th>
                        发布内容
                    </th>
                    <th>
                        操作
                    </th>

                </tr>
                </thead>
                <?php
                //1.导入配置文件
                require("dbConfig.php");
                //2.链接mysql,选择数据库
                $link = mysqli_connect(HOST,USER,PASS,DBNAME);
                if(!$link){
                    mysqli_error($link).'<h1>ERROR</h1>';
                }
                //3.执行查询，返回结果
                $sql = "select * from news order by addtime desc";
                $result = mysqli_query($link,$sql);
                //4.解析返回结果
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr class=\"success\">";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['title']}</td>";
                    echo "<td>{$row['keywords']}</td>";
                    echo "<td>{$row['author']}</td>";
                    echo "<td>".date("Y年-m月-d日",$row['addtime'])."</td>";
                    echo "<td>{$row['content']}</td>";
                    echo "<td>
                              <a href='javascript:dodel({$row['id']})''</a>删除
                              <a href='edit.php?id={$row['id']})'</a>修改
                              </td>";
                    echo "</tr>";
                }
                //5.释放结果
                mysqli_free_result($result);
                mysqli_close($link);
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
