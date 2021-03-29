<?php 
include('../../demo/DB.class.php');
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
	<form action="phonedo.php" method="post" onsubmit="return check_submit()">
		<table border="1">
			<tr>
				<td>商品名称</td>
				<td>
					<input type="text" name="p_name" id="p_name" onblur="check_name()">
					<span id="span_name"></span>
				</td>
			</tr>
			<tr>
				<td>商品描述</td>
				<td>
					<textarea name="p_desc" id="" cols="30" rows="10"></textarea>
				</td>
			</tr>
			<tr>
				<td>生产时间</td>
				<td>
					<select name="year" id="">
						<?php for ($year=2010; $year <=2020 ; $year++) {  ?>
                         <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
						<?php } ?>
					</select>年
                    <select name="month" id="">
                    	<?php for ($month=1; $month <=12 ; $month++) { ?>
                         <option value="<?php echo $month; ?>"><?php echo $month; ?> </option>
                    	<?php } ?>
                    </select>月
                    <select name="day" id="">
                    	<?php for ($day=1; $day <=31 ; $day++) { ?>
                        <option value="<?php echo $day ?>"> <?php echo $day; ?></option>
                    	<?php } ?>
                    </select>日
				</td>
			</tr>
			<tr>
				<td>商品分类</td>
				<td>
					<select name="b_id" id="">
					<?php foreach ($res as $key => $value) { ?>
						<option value="<?php echo $value['b_id']; ?>"><?php echo $value['b_name']; ?></option>
						<?php } ?>
					</select>
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
    var p_name =document.getElementById('p_name').value;
    var span_name=document.getElementById('span_name');
    var res=/^[0-9a-zA-Z\u4e00-\u9fa5]{2-15}$/;
    if (p_name=='') {
    	span_name.innerHTML="<font color='red'> 商品名称不能为空 </font>";
    	return false;
    }else if (res.test(p_name)) {
    	span_name.innerHTML="<font color='red'> 商品名称必须为数字，字母，汉字2-15位 </font>";
    	return false;
    }else{
      var aaa=false;   
       var xhr=new XMLHttpRequest();
           xhr.onreadystatechange=function(){
           if (xhr.status==200 && xhr.readyState==4) {
              if (xhr.responseText=='yes') {
              	span_name.innerHTML="<font color='red' >商品名称已存在</font>";
              	aaa=false;
              }else{
              	span_name.innerHTML="<font color='green'>√</font>";
              	aaa=true;
              }
           }
           }
         xhr.open('get','only.php?p_name='+p_name,false );
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