<?php 
$g_name=$_GET['g_name'];
$where=[['g_name','=',$g_name]];
include('../demo/DB.class.php');
$db=new DB();
$res=$db->where($where)->findAll('phonegoods');
if ($res) {
echo 'yes';
}else{
echo 'no';
}








 ?>