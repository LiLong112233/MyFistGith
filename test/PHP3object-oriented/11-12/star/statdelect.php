<?php 
$id=$_GET['id'];
include ('../../demo/DB.class.php');

$where=[
['id','=',$id]
];
$db=new DB();



 $res=$db->where($where)->delete('stat');



// echo $res;
   if ($res) {
   	echo "删除成功";
   	header("refresh:2;url=statlist.php");
   	// exit();
   	 // header("refresh:2;url=statlist.php");
    exit();
   }else{
   	echo "删除失败";
   	header("refresh:2;url=statlist.php");
   	exit;
   }






	 ?>