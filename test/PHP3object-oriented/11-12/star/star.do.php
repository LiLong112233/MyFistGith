<?php 

$data=$_POST;
// print_r($data);
$img=$_FILES['s_img'];

include ('../aaado.php');
$file=new file();
$file->size=6;
$file->type=['jpeg','jpg','png','gif'];
$file->dir='img';
$ree= $file->move($img);
// print_r($ree);
$data['s_img']=$ree;
// print_r($data);
include ('../../demo/DB.class.php');
$db=new DB();

$res=$db -> insert('stat',$data);
if ($res) {
 echo "添加成功";
 header("refresh:2;url=statlist.php");
 exit();
}else{
 echo "添加失败";
 header("refresh:2;url=star.php");
 exit();
}





 ?>