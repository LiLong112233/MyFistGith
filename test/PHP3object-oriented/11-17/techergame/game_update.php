<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/16
 * Time: 10:30
 */
include("../DB.class.php");
$db = new DB();
$res = $db->findAll('brandb');

$g_id = $_GET['g_id'];
$where =[
    ['g_id','=',$g_id]
];
$arr = $db->where($where)->find('game');
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
<form action="game_update_do.php" method="post" enctype="multipart/form-data">
    <table border="1">
        <input type="hidden" name="g_id" value="<?php echo $arr['g_id']?>">
        <tr>
            <td>游戏名称</td>
            <td><input type="text" name="g_name" id="g_name" value="<?php echo $arr['g_name']?>">
            </td>
        </tr>
        <tr>
            <td>游戏价格</td>
            <td>
                <input type="text" name="g_price" id="g_price" value="<?php echo $arr['g_price']?>">
            </td>
        </tr>
        <tr>
            <td>游戏描述</td>
            <td><textarea name="g_desc" id="" cols="30" rows="10"><?php echo $arr['g_desc']?></textarea></td>
        </tr>
        <tr>
            <td>品牌</td>
            <td>
                <select name="b_id" id="">
                    <?php foreach ($res as $k=>$v){ ?>
                        <option value="<?php echo $v['b_id']?>" <?php if($arr['b_id']==$v['b_id']){ echo "selected";}?>><?php echo $v['b_name']?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>游戏图片</td>
            <td><input type="file" name="g_img" id=""></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="修改"></td>
        </tr>
    </table>
</form>
</body>
</html>