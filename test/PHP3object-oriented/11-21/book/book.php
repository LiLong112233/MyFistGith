<?php 
include('../aaa/DB.class.php');
$db=new DB();
$res=$db->findAll('type');



 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<form action="bookdo.php" method="post" enctype="multipart/form-data" onsubmit="return check_submit()">
 		<table>
 			<tr>
 				<td>图书名称</td>
 				<td><input type="text" name="b_name" id="b_name" onblur="check_name()">
                   <span id="span_name"></span>
 				 </td>
 			</tr>
 			<tr>
 				<td>作者</td>
 				<td><input type="text" name="b_man" id="b_man" onblur="check_man()">
                 <span id="span_man"></span>
 				</td>
 			</tr>
 			<tr>
 				<td>所属分类</td>
 				<td>
 					<select name="t_id" id="">
 						<?php foreach ($res as $key => $value) {?>
                        <option value="<?php echo $value['t_id']; ?>"><?php echo $value['t_name']; ?></option>
 						<?php } ?>
 					</select>
 				</td>
 			</tr>
 			<tr>
 				<td>封面</td>
 				<td><input type="file" name="b_img" id=""></td>
 			</tr>
 			<tr>
 				<td>内容</td>
 				<td><textarea name="b_desc" id="" cols="30" rows="10"></textarea></td>
 			</tr>
 			<tr>
 				<td></td>
 				<td><input type="submit" value="发布"></td>
 			</tr>
 		</table>
 	</form>
 </body>
 </html>
<script>
	function check_name(){
		var b_name = document.getElementById('b_name').value;
		var span_name=document.getElementById('span_name');
        var res=/^[a-zA-Z0-9\u4e00-\u9fa5]{2,10}$/;
        if (b_name=='') {
        	span_name.innerHTML="<font color='red'>请输入图书名字</font>";
        	return false;
        }else if (res.test(b_name)==false) {
        	span_name.innerHTML="<font color='red'>图书名称有误，只可填字母数字汉字2-10位</font>";
        	return false;
        }else{
        	span_name.innerHTML="<font color='green'>√</font>";
        	return true;
        }
	}
    function check_man(){
    	var b_man = document.getElementById('b_man').value;
    	var span_man =document.getElementById('span_man');
        var arr = /^[\u4e00-\u9fa5]{2,4}$/;
        if (b_man=='') {
        	span_man.innerHTML="<font color='red'>请输入作者名字</font>";
        	return false;
        }else if (arr.test(b_man)==false) {
        	span_man.innerHTML="<font color='red'>作者的名字必须为2-4位汉字</font>";
            return false;
        }else{
        	span_man.innerHTML="<font color='green'>√</font>";
        	return true;
        }
    function check_submit(){
     if (check_name()&&check_man()) {
     return true;
     }else{
     		return false;
     }
    }    
     

    }




















</script>

