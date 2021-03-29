<?php 
$w_name=$_GET['w_name'];
$where=[['w_name','=',$w_name]];
include ('../../demo/DB.class.php');
$db=new DB();
$res=$db->where($where)->find('woke');
if ($res) {
 echo 'yes';
}else{
 echo 'no';
}



 ?>