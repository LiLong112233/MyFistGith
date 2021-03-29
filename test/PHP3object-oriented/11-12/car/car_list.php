<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/12
 * Time: 14:39
 */

$p = empty($_GET['p'])?1:$_GET['p'];
$p_num = 2;//每页显示条数

    include("../../DB.class.php");
    $db = new DB();
    $arr =$db->join('brand','brand.b_id=car.b_id')->page($p,$p_num)->findAll('car');

    $count = $db->join("brand",'brand.b_id=car.b_id')->count('car');
    include("../../Page.class.php");
    $page = new Page();
    $str =$page->paginate($count,$p_num);//总条数  //每页显示的条数
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
        <td>车号</td>
        <td>车名</td>
        <td>车价格</td>
        <td>是否上架</td>
        <td>车主</td>
        <td>品牌</td>
        <td>图片</td>
        <td>时间</td>
        <td>操作</td>
    </tr>
    <?php foreach ($arr as $k=>$v){?>
    <tr>
        <td><?php echo $v['c_id']?></td>
        <td><?php echo $v['c_name']?></td>
        <td><?php echo $v['c_price']?></td>
        <td><?php echo $v['is_new']?></td>
        <td><?php echo $v['c_man']?></td>
        <td><?php echo $v['b_name']?></td>
        <td><img src="<?php echo $v['c_img']?>" width="80" height="80" alt=""></td>
        <td><?php echo $v['c_time']?></td>
        <td>
            <a href="car_delete.php?c_id=<?php echo $v['c_id']?>">删除</a>
            <a href="car_update.php?c_id=<?php echo $v['c_id']?>">修改</a>
        </td>
    </tr>
    <?php }?>
</table>
  <?php echo $str?>
</body>
</html>
