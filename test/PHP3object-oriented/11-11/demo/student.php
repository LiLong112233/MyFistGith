<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/11
 * Time: 13:37
 */

    include ("../DB.class.php");
    $db = new DB();
    $arr = $db->findAll('class');

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
<form action="student_do.php" method="post">
<table border="1">
    <tr>
        <td>姓名</td>
        <td>
            <input type="text" name="s_name">
        </td>
    </tr>
    <tr>
        <td>性别</td>
        <td>
            <input type="radio" name="s_sex" id="" value="男" checked>男
            <input type="radio" name="s_sex" id="" value="女">女
    </td>
    </tr>
    <tr>
        <td>年龄</td>
        <td>
            <select name="s_age" id="">
                <?php  for($i=15;$i<=30;$i++){?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>地址</td>
        <td>
            <input type="text" name="s_address">
        </td>
    </tr>
    <tr>
        <td>班级</td>
        <td>
            <select name="c_id" id="">
                <?php foreach ($arr as $k=>$v){ ?>
                    <option value="<?php echo $v['c_id'] ?>"><?php echo $v['c_name']?></option>
                <?php }?>
            </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="submit" value="提交">
        </td>
    </tr>
    </table>
</form>
</body>
</html>
