<?php 
$link=mysqli_connect('127.0.0.1','root','123456','class');
$sql="select*from class ";
$query=mysqli_query($link,$sql);
$arr=mysqli_fetch_all($query,1);
 ?>
 <form>
 	<table>
 		<tr>
 			<td>学生名称</td>
 			<td>
 				input:text
 			</td>
 		</tr>
 		<tr>
 			<td>学生性别</td>
 			<td></td>
 		</tr>
 		<tr>
 		    <td>学生介绍</td>
 		    <td></td>
 		</tr>
 		<tr>
 			<td>所属班级</td>
 			<td></td>
 		</tr>
 		<tr>
 			<td></td>
 			<td>
 	         <input type="submit" value="学生添加">
 			</td>
 		</tr>	
 	</table>
 </form>						

