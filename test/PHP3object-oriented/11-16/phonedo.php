<?php 
$data=$_POST;

$img=$_FILES['g_img'];
include ('../demo/UploadFile.class.php');
  $aaa=new UploadFile();
  $aaa->size=6;
  $aaa->type=['jpeg','jpg','png','gif'];
  $aaa->dir='img';
  $res=$aaa->move($img);
  $data['g_img']=$res;
  include('../demo/DB.class.php');
  $db=new DB();
  $rs=$db->insert('phonegoods',$data);
  if ($rs) {
  	echo "添加成功";
  	header("refresh:2;url=phonelist.php");
  	exit();
  }else{
  	echo "添加失败";
  	header("refresh:2;url=phone.php");
  	exit();
  }


 ?>