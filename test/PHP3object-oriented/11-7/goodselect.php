<?php 
$g_id=$_GET['g_id'];

$link=mysqli_connect('127.0.0.1','root','123456','company');
$sql="select*from goods where g_id=$g_id";
$query=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($query);
// print_r($arr)
$pinglun=empty($_GET['pinglun'])?'':$_GET['pinglun'];

 ?>
 <?php echo $pinglun; ?>
 <table border="1">
 	<tr>
 		<td><?php echo $arr['g_id'] ?></td>
 		<td><?php echo $arr['g_name'] ?></td>
 		<td><?php echo  $arr['g_price'] ?></td>
 		<td><img src="<?php echo $arr['g_photo']; ?>"  width="80px" height="80px" alt=""></td>
 		<td><?php echo  $arr['g_desc'] ?></td>
 		<td><?php echo $arr['g_time'] ?></td>
 		<td><?php echo  $arr['is_sale'] ?></td>
 		<td><?php echo $arr['b_id'] ?></td>
 	</tr>
 </table>
 <form action="goodselect.php" method="get" >
 <input type="hidden" name="g_id" value="<?php echo $g_id; ?>">
 	<textarea name="pinglun" id="" cols="30" rows="10"></textarea>
 	<br>

 	<input type="submit" value="评论">
 </form>