<?php 
include('../demo/DB.class.php');
include('../demo/Page.class.php');
$g_name=empty($_GET['g_name'])?"":$_GET['g_name'];
$where=[];
if (!empty($g_name)) {
	$where[]=[ 
	'g_name','like',"%$g_name%" 
	];
}



$p=empty($_GET['p'])?1:$_GET['p'];
$p_num=2;

$db=new DB();
$res=$db->join('phonebrand','phonegoods.b_id=phonebrand.b_id')->page($p,$p_num)->findAll('phonegoods');
$count=$db->join('phonebrand','phonegoods.b_id=phonebrand.b_id')->count('phonegoods');

$page=new 	Page();
$str=$page->paginate($count,$p_num);


 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
<form action="" method="get">
	<input type="text" name="g_name" id="" placeholder="商品名称搜索" >
	 <input type="submit" value="搜索">
</form>






 <table border="1">
 <th>商品id</th>
 <th>商品名称</th>
 <th>商品品牌</th>
 <th>商品价格</th>
 <th>是否新品</th>
 <th>是否精品</th>
 <th>是否热卖</th>
 <th>商品描述</th>
 <th>商品图片</th>
 <th>操作</th>
 <?php foreach ($res as $key => $value) {?>
 <tr>
 	
 		<td><?php echo $value['g_id']; ?></td>
 		<td><?php echo $value['g_name']; ?></td>
 		<td><?php echo $value['b_name']; ?></td>
 		<td><?php echo $value['price']; ?></td>
 		<td>
 			<?php if ($value['is_new']) {
 				echo "√";
 			}else{
 				echo "×";
 				} ?>		
 		</td>
 		<td>
 				<?php if ($value['is_best']) {
 				echo "√";
 			}else{
 				echo "×";
 				} ?>		
 		</td>
 		<td>
 				<?php if ($value['is_hot']) {
 				echo "√";
 			}else{
 				echo "×";
 				} ?>		
 		</td>
 		<td><?php echo $value['g_desc']; ?></td>
 		<td><img src="<?php echo $value['g_img']; ?> " with="80" height="80" alt=""></td>
 		<td>
 			<a href="phonedetele.php?g_id=<?php echo $value['g_id']; ?>">删除</a>
 		</td>
 </tr>

 	<?php } ?>
 		</table>
 		<?php echo $str; ?>
 </body>
 </html>