<?php 
$g_id=$_GET['g_id'];
$where=[['g_id','=',$g_id]];
 include('../demo/DB.class.php');
 $db=new DB();
 $res=$db->where($where)->find('phonegoods');
 
 $aaa=$db->where($where)->delete('phonegoods');
if ($aaa) {
	unlink($res['g_img']);
echo "删除成功";
header("refresh:2;url=phonelist.php");
exit();
}else{
	echo "删除失败";
// header("refresh:2;url=phonelist.php");
// exit();
}



 ?>