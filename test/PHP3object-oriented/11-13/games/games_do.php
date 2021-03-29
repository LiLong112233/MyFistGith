<?php 
$date=$_POST;
include('../../demo/DB.class.php');
$db=new DB();
$res=$db->insert('games',$date);
if ($res) {
  echo "添加成功";
  header("refresh:2;url=games_list.php");
  exit();
}else{
  echo "添加失败";
  header("refresh:2;url=games.php");
  exit();
}







 ?>
