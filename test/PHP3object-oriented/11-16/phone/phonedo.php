<?php 
$p_name=$_POST['p_name'];
$p_desc=$_POST['p_desc'];
$p_time=$_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
$b_id=$_POST['b_id'];
$data['p_name']=$p_name;
$data['p_desc']=$p_desc;
$data['p_time']=$p_time;
$data['b_id']=$b_id;
include ('../../demo/DB.class.php');
$db=new DB();
$res=$db->insert('phone',$data);
if ($res) {
  echo "添加成功";
  header("refresh:2;url=phonelist.php");
  exit();
}else{
	echo "添加失败";
	header("refresh:2;url=phonelist.php");
	exit();
}






 ?>