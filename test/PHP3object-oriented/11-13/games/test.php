<?php 

$g_name=$_GET['g_name'];
include('../../demo/DB.class.php');
$db=new DB();
$where=[['gname','=',$g_name]];
$res=$db->where($where)->find('games');
if ($res) {
	echo "yes";
}else{
	echo "no";
}



 ?>