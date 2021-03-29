<?php 
$p =empty($_GET['p'])?1:$_GET['p'];
$p_num=2;
include('../../demo/DB.class.php');
$db= new DB();
$arr=$db->join('stattype','stat.s_id=stattype.s_id')->page($p,$p_num) ->findAll('stat');  
// print_r($arr)
$count=$db->join('stattype','stat.s_id=stattype.s_id')->count('stat');
include ('../../demo/Page.class.php');
$page=new Page();
$str=$page->paginate($count,$p_num);


 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<table border="1">
 		<tr>
 			<td>序号</td>
 			<td>明星姓名</td>
 			<td>性别</td>
 			<td>年龄</td>
 			<td>明星特长</td>
 			<td>明星写真</td>
 			<td>操作</td>
 		</tr>
 		<?php foreach ($arr as $key => $value) {?>
 		<tr>
 			<td><?php echo $value['id']; ?></td>
 			<td><?php echo $value['s_name']; ?></td>
 			<td><?php echo $value['s_sex']; ?></td>
 			<td><?php echo $value['s_age']; ?></td>
 			<td><?php echo $value['s_type']; ?></td>
 			<td><img src="<?php echo $value['s_img']; ?>" width="80" height="80" alt=""></td>
 			<td><a href="statupdate.php?id=<?php echo $value['id']; ?>">修改</a>
                <a href="statdelect.php?id=<?php echo $value['id']; ?>">删除</a>
 			</td>
 		</tr>
 		<?php } ?>
 	</table>
 	<?php echo $str; ?>
 </body>
 </html>