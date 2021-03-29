<?php 
include('../../demo/DB.class.php');
$db=new DB();
$res=$db->findAll('woketype');
 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<form action="wokedo.php" method="post" enctype="multipart/form-data" onsubmit="return check_submit()">
 		<table border="1" >
 			<tr>
 				<td>员工姓名</td>
 				<td>
 					<input type="text" name="w_name" id="w_name" onblur="check_name()">
 					<span id="span_name" ></span>
 				</td>
 			</tr>
 			<tr>
 				<td>手机号</td>
 				<td>
 					<input type="text" name="w_tel" id="w_tel" onblur="check_tel()">
 					<span id="span_tel" ></span>
 				</td>
 			</tr>
 			<tr>
 				<td>所属部门</td>
 				<td>
 					<select name="w_id" id="">
 						<?php foreach ($res as $key => $value) {?>
                        <option value="<?php echo$value['w_id'] ; ?>"><?php echo $value['w_type']; ?></option>
                        <?php } ?>
 					</select>
 				</td>
 			</tr>
 			<tr>
 				<td>员工形象照片</td>
 				<td>
 					<input type="file" name="w_photo" id="">	
 				</td>
 			</tr>
 			<tr>
 				<td></td>
 				<td><input type="submit" value="添加"></td>
 			</tr>
 		</table>
 	</form>
 </body>
 </html>
<script>
	function check_name(){
	 var w_name = document.getElementById('w_name').value;
	 var span_name=document.getElementById('span_name');
	 var res=/^[\u4e00-\u9fa5]{2,4}$/;
     if (w_name=='') {
     	span_name.innerHTML="<font color='red'> 员工姓名不能为空 </font>";
     	return false;
     }else if (res.test(w_name)==false) {
    span_name.innerHTML="<font color='red' >员工姓名必须为2-4位汉字</font>"
     }else{
       var aaa=false;
       var xhr=new XMLHttpRequest();
       xhr.onreadystatechange=function(){
       	if (xhr.status==200&&xhr.readyState==4) {
       		if (xhr.responseText=='yes') {
       			span_name.innerHTML="<font color='red'>员工姓名已存在</font>";
       			aaa=false;
       		}else{
       			span_name.innerHTML="<font color='green'>√</font>";
       			aaa=true; 
       		}
       	}
       }
   xhr.open('get','check_woke.php?w_name='+w_name,false );
   xhr.send(null);
   return aaa;
     }
	}
   function check_tel(){
   	var w_tel =document.getElementById('w_tel').value;
   	var span_tel=document.getElementById('span_tel');
   	var res = /^[\d]{11}$/;
   	if (w_tel=='') {
   		span_tel.innerHTML="<font color='red'>电话号码不能为空</font>";
   		return false;
   	}else if (res.test(w_tel)==false) {
   		span_tel.innerHTML="<font color='red'>电话号码必须为11位</font>";
         return false;
   	}else{
        span_tel.innerHTML="<font color='green'>√</font>";
        return true;
   	}
   }





</script>










