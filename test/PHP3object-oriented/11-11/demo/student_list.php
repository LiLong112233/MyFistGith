<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/11
 * Time: 13:59
 */

     $p= empty($_GET['p'])?1:$_GET['p'];
     $p_num=3;
     include("../DB.class.php");
     $db = new DB();
     $arr = $db->join('class','class.c_id=student.c_id')->page($p,$p_num)->findAll('student');

     $count = $db->join('class','class.c_id=student.c_id')->count('student');

     $page_count = ceil($count/$p_num);//总页数

     $str = "";
     for ($i=1;$i<=$page_count;$i++){
         $str .= "<a href='?p=$i'>$i</a>&nbsp;&nbsp;";
     }

//     include('../Page.class.php');
//     $page = new Page();
//     $str = $page->paginate(10,3);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table border="1">
    <tr>
        <td>学号</td>
        <td>姓名</td>
        <td>性别</td>
        <td>年龄</td>
        <td>地址</td>
        <td>班级</td>
        <td>操作</td>
    </tr>
    <?php foreach ($arr as $k=>$v){?>
    <tr>
        <td>
            <?php echo $v['s_id']?>
        </td>
        <td><?php echo $v['s_name']?></td>
        <td><?php echo $v['s_sex']?></td>
        <td><?php echo $v['s_age']?></td>
        <td><?php echo $v['s_address']?></td>
        <td><?php echo $v['c_name']?></td>
        <td>
            <a href="student_delete.php?s_id=<?php echo $v['s_id']?>">删除</a>
            <a href="student_update.php?s_id=<?php echo $v['s_id']?>">修改</a>
        </td>
    </tr>
    <?php } ?>
</table>
<?php  echo $str ?>
</body>
</html>
