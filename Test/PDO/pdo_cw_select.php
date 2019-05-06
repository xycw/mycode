
<table class="table">
    <thead>
    <tr>
        <th>
            名称
        </th>
        <th>
            电话
        </th>
        <th>
            学院
        </th>
        <th>
            ID
        </th>
    </tr>
    </thead>
</table>
<?php
/**
 * Created by PhpStorm.
 * User: niaogebiji
 * Date: 2019/5/6
 * Time: 上午10:07
 */

include 'pdo_config.php';
$pdo = startpdo();
$pdo->query('set names utf8;');
$name = $_GET['select'];
$sql = "select s.name,s.phone,c.collegeName,c.collegeId from student s inner join college c on s.collegeId = c.collegeId where s.name = '{$name}'LIMIT 1";
$res = $pdo->query($sql);
if($res->rowCount()>0){
    foreach ($res as $k){
        print $k['name'];
        print $k['phone'];
        print $k['collegeName'];
        print $k['collegeId'];
        echo "<td>
             删除
             修改
              </td>";
    }
}else{
    echo "查询不到";
}
