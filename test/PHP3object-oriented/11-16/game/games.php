<?php 
include('../../demo/DB.class.php');
$db=new DB();
$res=$db->findAll('gbrand');
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="games.do.php" method="post" enctype="multipart/form-data">
		<table border="1">
			<tr>
				<td>游戏名称</td>
				<td>
					<input type="text" name="gname" id="gname" onblur="check_name()">
					<span id="span_name"> </span>
				</td>
			</tr>
			<tr>
				<td>游戏价格</td>
				<td>
					<input type="text" name="gprice" id="gprice" onblur="check_price()">
					<span id="span_price"></span>
				</td>
			</tr>
			<tr>
				<td>游戏介绍</td>
				<td>
					<input type="text" name="gdesc" id="gdesc" onblur="check_desc()">
					<span id="span_gdesc"> </span>	
				</td>
			</tr>
			<tr>
				<td>品牌</td>
				<td>
					<select name="b_id" id="">
					<?php foreach ($res as $key => $value) { ?>
						<option value="<?php echo $value['b_id']; ?>"><?php echo $value['b_name']; ?></option>
					<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>游戏图片</td>
				<td>
					<input type="file" name="gimg" id="">
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="提交"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<script>
	function check_name(){
		var gname = document.getElementById('gname').value;
		var span_name=document.getElementById('span_name');
		var res=/^[\u4e00-\u9fa5]{1,10}$/;
		if (gname=='') {
			span_name.innerHTML="<font color='red'>游戏名称必填</font>";
			return false;
		}else  if (res.test(gname)==false) {
			span_name.innerHTML="<font color='red'> 游戏名字必须为汉字1-10位 </font>";
			return false;
		}else{
           var aaa=false;
           var xhr=new XMLHttpRequest();
           xhr.onreadystatechange=function(){
           if (xhr.status==200 && xhr.readyState==4) {
              if (xhr.responseText=='yes') {
              	span_name.innerHTML="<font color='red' >游戏名称已存在</font>";
              	aaa=false;
              }else{
              	span_name.innerHTML="<font color='green'>√</font>";
              	aaa=true;
              }
           }
           }
         xhr.open('get','only.php?gname='+gname,false );
         xhr.send(null);
         return aaa;
		}
	}
 




</script>