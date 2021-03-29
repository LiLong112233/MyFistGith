<?php 
$data=$_POST;
$b_img=$_FILES['b_img'];
include ('../aaa/UploadFile.class.php');
$UploadFile=new UploadFile();
$UploadFile->size=6;
$UploadFile->type=['jpeg','jpg','gif'];
$UploadFile->dir='img';
$photo=$UploadFile->move($b_img);
$data['b_img']=$photo;
include('../aaa/DB.class.php');
$db=new DB();
$res=$db->insert('book',$data);
// print_r($data);
if ($res) {
 echo "添加成功";
 header("refresh:2;url=booklist.php");
 exit();
}else{
 echo "添加失败";
 header("refresh:2;url=book.php");
 exit;
}



 ?>