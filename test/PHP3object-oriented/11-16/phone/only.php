<?php 
$p_name=$_GET['p_name'];
$where=[['p_name','=',$p_name]];
include('../../demo/DB.class.php');
$db=new DB();
$res=$db->where($where)->find('phone');
if ($res) {
echo 'yes';	
}else{
echo 'no';
}






 ?>