<?php 
include ('../aaa/DB.class.php');
$b_id=$_GET['b_id'];
$db=new DB();
$where=[['b_id','=',$b_id]];
$arr=$db->where($where)->find('book');
$res=$db->where($where)->delete('book');
if ($res) {
   unlink($arr['b_img']);
   echo "删除成功";
   header("refresh:2;url=booklist.php");
}else{
	echo "删除失败";
	header("refresh:2;url=booklist.php");
}






 ?>