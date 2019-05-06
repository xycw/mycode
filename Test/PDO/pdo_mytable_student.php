<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>11</title>
</head>
<body>
<table class="table">
    <thead>
    <tr>
        <th>
            编号
        </th>
        <th>
            新闻标题
        </th>
        <th>
            关键词
        </th>
    </tr>
    </thead>
    <?php
    //1.导入配置文件
    require("pdo_config.php");
    //3.执行查询，返回结果
    $pdo = startpdo();
    $pdo->query('set names utf8;');
    $sql = "select * from student";
    //4.解析返回结果
    $res = $pdo->query($sql);
    foreach ($res as $row){
        echo "<tr>";
        echo "<td>{$row['studentId']}</td>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['phone']}</td>";
        echo "<td>
             删除
             修改
              </td>";
        echo "</tr>";
    }
    //5.释放结果
    ?>
</table>
<form action="pdo_cw_select.php" method="get">
    查询详细信息<input type="text" name="select">
    <input type="submit" value="提交">
</form>
<form action="pdo_cw_add.php" method="get">
    增加用户信息<br>
    学号<input type="text" name="id"><br>
    名称<input type="text" name="name"><br>
    电话<input type="text" name="phone"><br>
    学院ID<input type="text" name="schoolid"><br>
    <input type="submit" value="提交">
</form>
</body>
</html>