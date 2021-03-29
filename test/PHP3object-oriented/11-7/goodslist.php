<?php 
$g_name=empty($_GET['g_name'])?'':$_GET['g_name'];
$where=1;
if (!empty($g_name)) {
$where  .="  and goods.g_name like '%$g_name%'";
}



$link=mysqli_connect('127.0.0.1','root','123456','company');
$p=empty($_GET['p'])?1:$_GET['p'];
$p_num=2;
$offset=($p-1)*$p_num;
$sql="select*from goods inner join brand on goods.b_id=brand.b_id and $where limit $offset,$p_num";
echo $sql;
$query=mysqli_query($link,$sql);
$arr=mysqli_fetch_all($query,1);

$count_sql="select count(*) as num from goods  where $where";
$count_query=mysqli_query($link,$count_sql);
$count_arr=mysqli_fetch_assoc($count_query);
$num=$count_arr['num'];
$count=ceil($num/$p_num);

$str='';
for ($i=1; $i <=$count ; $i++) { 
	$str .="<a href='goodslist.php?p=$i&g_name$g_name'>$i</a>&nbsp";
}




 ?>
<form action="goodslist.php" method="get">
	<input type="text" name="g_name" id="" placeholder="商品名称" value="<?php echo $g_name; ?>">
	<input type="submit" value="搜索">

</form>





 <table border="1">
 <?php foreach ($arr as $key => $value) { ?>
 	<tr>
 		<td><?php echo $value['g_id']; ?></td>
 		<td> <a href="goodselect.php?g_id=<?php echo $value['g_id']; ?>"><?php echo $value['g_name']; ?></a> </td>
 		<td><?php echo $value['g_price']; ?></td>
 		<td><?php echo $value['g_desc']; ?></td>
 		<td><?php echo $value['b_name']; ?></td>
 		<td><?php 
          if ($value['is_sale']==1) {
          	echo "上架";
          }else{
          	echo "未上架";
          }
 		 ?></td>
 		<td><?php echo $value['g_time']; ?></td>
 		<td><img src="<?php echo $value['g_photo']; ?>" width="80px" height="80px" alt=""></td>
 		<td>
 			<a href="#">编辑</a>
 			<a href="#">删除</a>
 		</td>
 	</tr>
 	<?php } ?>
 </table>
 <?php echo $str; ?>