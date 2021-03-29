<?php 
$id=$_GET['id'];
$where=[['id','=',$id]];
include ('../../aaa/DB.class.php');
$db=new DB();
$res=$db->where($where)->find('woke');

$ree=$db->where($where)->delete('woke');
if ($ree) {
 unlink($res['w_photo']);
 echo "删除成功";
 header("refresh:2;url=wokelist.php");
 exit();
}else{
 echo "删除失败";
 header("refresh:2;url=wokelist.php");
 exit();
}



 ?>