<?php 
$p=empty($_GET['p'])?1:$_GET['p'];
$p_num=2;
include('DB.class.php');
$db=new DB();
$res= $db-> join('gbrand','games.b_id=gbrand.b_id')-> page($p,$p_num)-> findAll('games');
$count =$db-> join('gbrand','games.b_id=gbrand.b_id')-> count('games');

$page_count=ceil($count/$p_num);

$str="";
for($i=1;$i<=$page_count;$i++){
$str .="<a href='?p=$i' >$i</a>&nbsp;&nbsp;";
}



 ?>
 <table border="1">
 <?php foreach ($res as $key => $value) { ?>
 	<tr>
 		<td><?php echo $value['gid']; ?></td>
 		<td><?php echo $value['gname']; ?></td>
 		<td><?php echo $value['gprice']; ?></td>
 		<td><?php echo $value['gdesc']; ?></td>
 		<td><?php echo $value['b_name']; ?></td>
 		<td><?php 
        if ($value['is_up']==1) {
        echo "已上架";
        }else{
        echo "未上架";
        }
 		 ?></td>
 		<td>
 			<a href="games_update.php?id=<?php echo $value['gid']; ?>">修改</a>
 			<a href="gemes_delect.php?id=<?php echo $value['gid']; ?>">删除</a>
 		</td>
 	</tr>
 	<?php } ?>
 </table>
 <?php echo $str; ?>