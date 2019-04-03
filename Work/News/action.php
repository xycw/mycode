<?php
/**
 * 增删改查.
 * User: niaogebiji
 * Date: 2018/12/3
 * Time: 上午10:53
 */
require ("dbConfig.php");
$link = mysqli_connect(HOST,USER,PASS,DBNAME);
if(!$link){
    die("ERROR".mysqli_error());
}
//mysqli_select_db(DBNAME,$link);
switch ($_GET['action']){
    case "add":
        $title = $_POST['title'];
        $keywords = $_POST['keywords'];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $addtime = time();
        $sql = "insert into news values(null,'{$title}','{$keywords}','{$author}','{$addtime}','{$content}')";
        mysqli_query($link,$sql);
        $id = mysqli_insert_id($link);//获取添加信息自增id
        if($id>0){
            echo "<h3>News Insert Ok!</h3>";
        }else{
            echo "<h3>News Insert error</h3>";
        }
        echo "<a href='javascript:window.history.back()'>返回</a>&nbsp";
        echo "<a href='index.php'>浏览新闻</a>";
        break;
    case "del":
        //1.获取要删除的id号
        $id = $_GET['id'];
        //2.拼装删除sql语句，执行
        $sql = "delete from news where id = {$id}";
        mysqli_query($link,$sql);
        //3.自动跳转到浏览新闻页面
        header("Location:index.php");
        break;
    case "update":
        break;
}
mysqli_close($link);