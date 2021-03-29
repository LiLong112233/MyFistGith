<?php 
include ('../aaa/DB.class.php');
include ('../aaa/Page.class.php');
$d_name=empty($_GET['b_name'])?"":$_GET['b_name'];
$where=[];
if (!empty($d_name)) {
	$where[]=[
    'b_name','like',"%$d_name%"
	];
}
$p=empty($_GET['p'])?1:$_GET['p'];
$p_num=2;
$db=new DB();
$arr=$db->join('type','book.t_id=type.t_id')->where($where)->page($p,$p_num)->findAll('book');
$count=$db->join('type','book.t_id=type.t_id')->where($where)->count('book');
$page=new Page();
$str=$page->p_page($count,$p_num);
 ?>
 <form action="booklist.php" method="get">
   <input type="text" name="b_name" id="" placeholder="名字" value="<?php echo $d_name; ?>">
   <input type="submit" value="搜索">	
 </form>
 <table border="1">
 	<tr>
 		<td>编号</td>
 		<td>名字</td>
 		<td>作者</td>
 		<td>分类</td>
 		<td>图片</td>
 		<td>介绍</td>
 		<td>出版时间</td>
 		<td>操作</td>
 	</tr>
 	<?php foreach ($arr as $key => $value) { ?>
 	<tr>
 		<td><?php echo $value['b_id']; ?></td>
 		<td><?php echo $value['b_name']; ?></td>
 		<td><?php echo $value['b_man']; ?></td>
 		<td><?php echo $value['t_name']; ?></td>
 		<td><img src="<?php echo $value['b_img']; ?>" width="80" height="80"  alt=""></td>
 		<td><?php echo $value['b_desc']; ?></td>
 		<td><?php echo $value['b_time']; ?></td>
 		<td>
 			<a href="bookdelete.php?b_id=<?php echo $value['b_id']; ?>">删除	</a>
 		</td>
 	</tr>
 	<?php } ?>
 </table>
 <?php echo $str; ?>