<?php 
include ('../../demo/DB.class.php');
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
 	<form action="games_do.php" method="post" onsubmit="return check_submit()">
 		<table border="1"> 
 			<tr>
 				<td>游戏名称</td>
 				<td>
 					<input type="text" name="gname" id="gname" onblur="check_name()">
 					<span id="span_name">  </span>	
 				</td>
 			</tr>
 			<tr>
 				<td>游戏价格</td>
 				<td>
 					<input type="text" name="gprice" id="gprice" onblur=" check_price() ">
 					<span id="span_prce"> </span>
 				</td>
 			</tr>
 			<tr>
 				<td>游戏介绍</td>
 				<td>
 					<textarea name="gdesc" id="gdesc" cols="30" rows="10" onblur="check_desc()"></textarea>
 				    <span id="span_desc"></span>
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
 				<td></td>
 				<td>
 					<input type="submit" value="添加">
 				</td>
 			</tr>
 		</table>
 	</form>
 </body>
 </html>
 <script>
 var aaa=true;
function check_name(){
var gname = document.getElementById('gname').value;
var span_name= document.getElementById('span_name');
var res = /^[\u4e00-\u9fa5]{1,10}$/;

if ( res.test(ganme)==false) {
  span_name.innerHTML="<font  ></font>"
};


if (gname) {
var xhr = new XMLHttpRequest();
xhr.onreadystatechange=function(){
	if (xhr.readyState==4 && xhr.status==200) {
     var result=xhr.responseText;
     if (result=='no') {
     	span_name.innerHTML="<font color='gerrn'>√</font>";
       aaa=true;
     }else if (result=='yes') {
     	span_name.innerHTML="<font color='red'>用户名已存在 </font>";
     	aaa=false;
     };
	}
}
xhr.open('get','test.php?g_name='+gname);
xhr.send();
return aaa;

}else{
	span_name.innerHTML="<font color='red' >商品名称不能为空</font>";
	return false;
}
}

function check_price(){
  var gprice= document.getElementById('gprice').value;
  var span_prce=document.getElementById('span_prce');
  if (gprice) {
    span_prce.innerHTML="<font color='gerrn' >√</font>";
    return true;
  }else{
    span_prce.innerHTML="<font color='red'>游戏价格不能为空 </font>";
    return false;
  }
}
function check_desc(){
  var gdesc=document.getElementById('gdesc').value;
  var span_prce=document.getElementById(span_prce);
  if (gdesc) {
    span_desc.innerHTML="<font color='gerrn' >√</font>";
    return true;
  }else{
    span_desc.innerHTML="<font color='red'>游戏介绍不能为空</font>";
    return false;
  }

}
function check_submit(){
  if (check_name()&&check_price()&&check_desc()) {
    return true;
  }else{
    return false;
  }
}








 </script>