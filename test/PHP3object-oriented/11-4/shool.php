<?php 
$link=mysqli_connect('127.0.0.1','root','123456','student');
$sql="select*from zhuanye";
$query=mysqli_query($link,$sql);
$arr=mysqli_fetch_all($query,1)
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="shooldo.php" method="post" enctype="multipart/form-data" onsubmit=" return check_submit">
		<table border="1">
			<tr>
				<td>大学名称</td>
				<td>
					<input type="text" name="s_name" id="s_name" onblur="check_name">
					<span id="span_name" ><font ></font></span>
				</td>
			</tr>
			<tr>
				<td>大学图片</td>
				<td>
					<input type="file" name="s_img" >
				</td>
			</tr>
			<tr>
				<td>大学介绍</td>
				<td><textarea name="s_desc" id="s_desc" cols="30" rows="10" onblur="check_desc"></textarea>
                 <span id="desc"><font></font></span>
				</td>
			</tr>
			<tr>
				<td>大学专业</td>
				<td>
					<select name="z_id" id="">
						<?php foreach ($arr as $key => $value) {?>
                       <option value="<?php echo $value['z_id']; ?>"><?php echo $value['z_name']; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>建校时间</td>
				<td>
					<select name="year" id="">
						<?php for ($year=1950; $year <=2020 ; $year++) { ?>
						<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                         <?php } ?>
					</select>年
                    <select name="mouth" id="">
						<?php for ($mouth=1; $mouth <=12 ; $mouth++) { ?>
						<option value="<?php echo $mouth; ?>"><?php echo $mouth; ?></option>
                         <?php } ?>
					</select>月
                     <select name="day" id="">
						<?php for ($day=1; $day <=31 ; $day++) { ?>
						<option value="<?php echo $day; ?>"><?php echo $day; ?></option>
                         <?php } ?>
					</select>日

				</td>
			</tr>
			<tr>
				<td><input type="submit" value="提交"></td>
				<td></td>
			</tr>
		</table>
	</form>
</body>
</html>