<?php 
 $p=empty($_GET['p'])?:$_GET['p'];
 $p_num=2;
$w_name=empty($_GET['w_name'])?"":$_GET['w_name'];
$where=[];
if (!empty($w_name)) {
 $where[]=['w_name','like',"%$w_name%"];
}



include('../../aaa/DB.class.php');
include ('../../aaa/Page.class.php');
$db=new DB();
$arr=$db->join('woketype','woke.w_id=woketype.w_id')->where($where)->page($p,$p_num)->findAll('woke');
$count =$db->join('woketype','woke.w_id=woketype.w_id')->where($where)->count('woke');
$page=new Page();
$str=$page->p_page($count,$p_num);




 ?>
<form action="wokelist.php" method="get">
	<input type="text" name="w_name" id="" placeholder="员工姓名">
	<input type="submit" value="搜索">
</form>

<table border="1">
<?php foreach ($arr as $key => $value) { ?>
	<tr>
		<td><?php echo $value['id']; ?></td>
		<td><?php echo $value['w_name']; ?></td>
		<td><?php echo $value['w_tel']; ?></td>
		<td><?php echo $value['w_type']; ?></td>
		<td><img src="<?php echo $value['w_photo']; ?>" width="80" heigth="80" alt=""></td>
		<td>
			<a href="update.php?id=<?php echo $value['id']; ?>">修改</a>
			<a href="delect.php?id=<?php echo $value['id']; ?>">删除</a>
		</td>
	</tr>
	<?php } ?>
</table>
<?php echo $str; ?>