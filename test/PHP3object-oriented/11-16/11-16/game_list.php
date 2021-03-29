<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/16
 * Time: 14:55
 */
   include("../DB.class.php");
   include("../Page.class.php");

   $g_name = empty($_GET['g_name'])?"":$_GET['g_name'];
   $g_price = empty($_GET['g_price'])?"":$_GET['g_price'];
   $where =[];
   if (!empty($g_name)){
       $where[] = [
           'g_name','like',"%$g_name%"
       ];
   }
   if (!empty($g_price)){
       $where[]=[
          'g_price','like',"%$g_price%"
       ];
   }
   $p=empty($_GET['p'])?1:$_GET['p'];
   $p_num = 2;
   $db = new  DB();
   $res = $db->join('brandb','brandb.b_id=game.b_id')->where($where)->page($p,$p_num)->findAll('game');
//   print_r($res);exit;
   //获取总条数
   $count = $db->join('brandb','brandb.b_id=game.b_id')->where($where)->count('game');

   $page = new Page();
   $str =$page->p_page($count,$p_num);

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
<form action="" method="get">
    <input type="text" name="g_name" id="" placeholder="游戏名称" value="<?php echo $g_name?>">
    <input type="text" name="g_price" placeholder="游戏价格" value="<?php echo $g_price?>">
    <input type="submit" value="搜索">
</form>
<table border="1">
    <tr>
        <td>游戏ID</td>
        <td>游戏名称</td>
        <td>游戏价格</td>
        <td>游戏描述</td>
        <td>游戏品牌</td>
        <td>游戏图片</td>
        <td>操作</td>
    </tr>
    <?php foreach ($res as $k=>$v){?>
    <tr>
        <td><?php echo $v['g_id'];?></td>
        <td><?php echo $v['g_name'];?></td>
        <td><?php echo $v['g_price'];?></td>
        <td><?php echo $v['g_desc'];?></td>
        <td><?php echo $v['b_name'];?></td>
        <td><img src="<?php echo $v['g_img'];?>" width="80" height="80" alt=""></td>
        <td>
            <a href="game_delete.php?g_id=<?php echo $v['g_id'];?>">删除</a>||
            <a href="game_update.php?g_id=<?php echo $v['g_id'];?>">修改</a>
        </td>
    </tr>
    <?php } ?>
</table>
<?php echo $str;?>
</body>
</html>
