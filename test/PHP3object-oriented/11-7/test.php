<?php 
$g_name=$_GET['g_name'];
 
$link=mysqli_connect('127.0.0.1','root','123456','company');
$sql="select*from goods where g_name='$g_name'";
$query=mysqli_query($link,$sql);
$arr=mysqli_fetch_assoc($query);
if ($arr) {
	echo "yes";
}else{
	echo "no";
}





 ?>