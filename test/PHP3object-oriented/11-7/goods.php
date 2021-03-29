<?php 
$link=mysqli_connect('127.0.0.1','root','123456','company');
$sql="select*from brand";
$query=mysqli_query($link,$sql);
$arr=mysqli_fetch_all($query,1);

 ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="goodsdo.php" method="post" enctype="multipart/form-data" onsubmit="return check_submit()" >
			<table border="1">
				<tr>
					<td>商品名称</td>
					<td>
						<input type="text" name="g_name" id="g_name" onblur="check_name()" >
						<span id="span_name" ><font ></font></span>
					</td>
				</tr>
				<tr>
					<td>商品价格</td>
					<td><input type="text" name="g_price" id=""></td>
				</tr>
				<tr>
					<td>商品描述</td>
					<td>
						<textarea name="g_desc" id="" cols="30" rows="10"></textarea>
					</td>
				</tr>
				<tr>
					<td>是否上架</td>
					<td>
						<input type="radio" name="is_sale" id="" value="1">是
						<input type="radio" name="is_sale" id="" value="2">否
					</td>
				</tr>
				<tr>
					<td>所属品牌</td>
					<td>
					<select name="b_id" id="">
						<?php foreach ($arr as $key => $value) {?>
                        <option value="<?php echo $value['b_id']; ?>"><?php echo $value['b_name']; ?></option>
                       <?php } ?>
                       </select>
 					</td>
				</tr>
				<tr>
					<td>商品图片</td>
					<td>
						<input type="file" name="g_img" id="">
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" value="商品添加">
					</td>
				</tr>
			</table>
		</form>	
</body>
</html>
<script>   
  var aaa =true;
	function check_name(){
		var g_name = document.getElementById('g_name').value;
		var span_name=document.getElementById('span_name');
        if (g_name) {     
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
      	if (xhr.readyState==4 && xhr.status==200) {
      		 var result =xhr.responseText;
              if (result=='no') {
                  span_name.innerHTML="<font color='green' >√</font>";
                  aaa= true;
              }else if( result=='yes'){
                  span_name.innerHTML="<font color='red'>用户名已存在 </font>"
                  aaa=false;
              }
                   
      	}
              }
        xhr.open('get','test.php?g_name='+g_name);
        xhr.send();
        return aaa;


        }else{
        	span_name.innerHTML="<font color='red'>商品名称不能为空</font>"
        	return false;
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