<?php 
include('../demo/DB.class.php');
$db=new DB();
$res=$db->findAll('phonebrand');
 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="phonedo.php" method="post" enctype="multipart/form-data" onsubmit="return check_submit()" >
		<table border="1">
			<tr>
				<td>商品名称</td>
				<td>
				<input type="text" name="g_name" id="g_name" onblur="check_name()">
				<span id="span_name" ></span>	
				</td>
			</tr>
			<tr>
				<td>商品品牌</td>
				<td>
					<select name="b_id" id="">
						<?php foreach ($res as $key => $value) {?>
                        <option value="<?php echo $value['b_id']; ?>"><?php echo $value['b_name']; ?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>商品价格</td>
				<td>
					<input type="text" name="price" id="">
				</td>
			</tr>
			<tr>
				<td>商品设置</td>
				<td>
					新品<input type="checkbox" name="is_new" id="" value="√">
					精品<input type="checkbox" name="is_best" id="" value="√">
					热卖<input type="checkbox" name="is_hot" id="" value="√">
				</td>
			</tr>
			<tr>
				<td>商品描述</td>
				<td>
					<textarea name="g_desc" id="" cols="30" rows="10"></textarea>
				</td>
			</tr>
			<tr>
				<td>手机宣传封面</td>
				<td>
					<input type="file" name="g_img" id="">
				</td>
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
<script>
	function check_name(){
      var g_name=document.getElementById('g_name').value;
      var span_name=document.getElementById('span_name');
      var res=/^[a-zA-Z0-9\u4e00-\u9fa5]{2,15}$/;
      if (g_name=='') {
      	span_name.innerHTML="<font color='red'> 商品名字不能为空 </font>";
      	return false;
      }else if (res.test(g_name)==false) {
      	span_name.innerHTML="<font color='red'> 商品名字必须为2-10位字母数字汉字 </font>";
      	return false;
      }else{
         var aaa= false;
         var xhr= new XMLHttpRequest();
         xhr.onreadystatechange=function(){
         	if (xhr.status==200&&xhr.readyState==4) {
         		if (xhr.responseText=='yes') {
         			span_name.innerHTML="<font color='red'>商品名称已存在</font>";
         			aaa=false;
         		}else{
         			span_name.innerHTML="<font color='green'>√</font>";
                    aaa=true;
         		}
         	}
         }
       xhr.open('get','ajxt.php?g_name='+g_name,false);
       xhr.send(null);
       return aaa;    	
      }
	}
	function check_submit(){
	if (check_name()) {
		return true;
	}else{
		return false;
	}
	}






</script>