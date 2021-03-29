<?php 
$id=$_GET['id'];
$where=[['id','=',$id]];
include ('../../demo/DB.class.php');
$db=new DB();
$rss=$db->findAll('stattype');

$res=$db->join('stattype','stat.s_id=stattype.s_id')->where($where)->find('stat');
print_r($res);


 ?>
 <form action="starupdatedo.php" method="post" enctype="multipart/form-data">
 		<table border="1">
 		<input type="hidden" name="id" value="<?php echo $res['id']; ?>">
 			<tr>
 				<td>明星姓名</td>
 				<td>
 					<input type="text" name="s_name" id="" value="<?php echo $res['s_name']; ?>">
 				</td>
 			</tr>
 			<tr>
 				<td>明星性别</td>
 				<td>
 				<?php if ($res['s_sex']=="男") {?>
 					<input type="radio" name="s_sex" id="" value="男" checked>男
                    <input type="radio" name="s_sex" id="" value="女">女
 				<?php }else{ ?>
 				    <input type="radio" name="s_sex" id="" value="男">男
                    <input type="radio" name="s_sex" id="" value="女" checked>女
 				<?php } ?>
 				</td>
 			</tr>
 			<tr>
 				<td>明星年龄</td>
 				<td>
 				<select name="s_age" id="" >
 					<?php for($i=18;$i<=50;$i++){ ?>
                   <option value="<?php echo $i; ?>"<?php if ($i==$res['s_age']) {echo 'selected';} ?>><?php echo $i; ?></option>
 					<?php } ?>
 				</select>
 				</td>
 			</tr>
 			<tr>
 				<td>明星特长</td>
 				<td>
 					<select name="s_id" id="">
 						<?php foreach ($rss as $key => $value) { ?>
 					  <option value="<?php echo $value['s_id']; ?>" <?php if ($value['s_id']==$res['s_id']) { echo "selected";} ?>><?php echo $value['s_type']; ?></option>	       
 					  <?php } ?>
 					</select>
 				</td>
 			</tr>
 			<tr>
 				<td>明星个人写真</td>
 				<td><input type="file" name="s_img" id="" ></td>
 			</tr>
 			<tr>
 				<td></td>
 				<td>
 					<input type="submit" value="提交">
 				</td>
 			</tr>
 		</table>
 	</form>