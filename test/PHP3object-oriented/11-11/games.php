<?php 
include ('DB.class.php');
  $db=new DB;
 $res= $db->findall('gbrand');
 // print_r($res);

 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<form action="games_do.php" method="post">
 		<table border="1">
 			<tr>
 				<td>游戏名称</td>
 				<td>
 					<input type="text" name="gname" id="">
 				</td>
 			</tr>
 			<tr>
 				<td>游戏价格</td>
 				<td>
 					<input type="text" name="gprice" id="">
 				</td>
 			</tr>
 			<tr>
 				<td>游戏介绍</td>
 				<td>
 					<textarea name="gdesc" id="" cols="30" rows="10"></textarea>
 				</td>
 			</tr>
 			<tr>
 				<td>游戏品牌</td>
 				<td>
 					<select name="b_id" id="">
 						<?php foreach ($res as $key => $value) {?>
 							<option value="<?php echo $value['b_id']; ?>"><?php echo $value['b_name']; ?></option>
 						<?php } ?>
 					</select>
 				</td>
 			</tr>
 			<tr>
 				<td>是否上市</td>
 				<td>
 					<input type="radio" name="is_up" id="" value="1" >上市
 					<input type="radio" name="is_up" id="" value="2">不上市
 				</td>
 			</tr>
 			<tr>
 				<td></td>
 				<td>
 					<input type="submit" value="添加">
 				</td>
 			</tr>
 		</table>
 	</form>
 </body>
 </html>