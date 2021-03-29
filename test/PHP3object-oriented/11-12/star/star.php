<?php 
include ('../../demo/DB.class.php');
$db=new DB();
$res=$db->findAll('stattype');
// print_r($res);
 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<form action="star.do.php" method="post" enctype="multipart/form-data">
 		<table border="1">
 			<tr>
 				<td>明星姓名</td>
 				<td>
 					<input type="text" name="s_name" id="">
 				</td>
 			</tr>
 			<tr>
 				<td>明星性别</td>
 				<td>
 					<input type="radio" name="s_sex" id="" value="男" checked>男
                    <input type="radio" name="s_sex" id="" value="女">女
 				</td>
 			</tr>
 			<tr>
 				<td>明星年龄</td>
 				<td>
 				<select name="s_age" id="" >
 					<?php for($i=18;$i<=50;$i++){ ?>
                   <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
 					<?php } ?>
 				</select>
 				</td>
 			</tr>
 			<tr>
 				<td>明星特长</td>
 				<td>
 					<select name="s_id" id="">
 						<?php foreach ($res as $key => $value) { ?>
 					  <option value="<?php echo $value['s_id']; ?>"><?php echo $value['s_type']; ?></option>	       
 					  <?php } ?>
 					</select>
 				</td>
 			</tr>
 			<tr>
 				<td>明星个人写真</td>
 				<td><input type="file" name="s_img" id=""></td>
 			</tr>
 			<tr>
 				<td></td>
 				<td>
 					<input type="submit" value="提交">
 				</td>
 			</tr>
 		</table>
 	</form>
 </body>
 </html>