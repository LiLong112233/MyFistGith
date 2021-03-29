<?php 
$data=$_POST;
 $sub= substr($data['w_tel'],3,4 );
 $str= str_replace($sub,'****',$data['w_tel']);
 $data['w_tel']=$str;
$w_photo=$_FILES['w_photo'];
include ('../../demo/UploadFile.class.php');
$UploadFile=new UploadFile();
$UploadFile->size=6;
$UploadFile->type=['jpeg','jpg','png','gif'];
$UploadFile->dir='img';
$res=$UploadFile->move($w_photo);
$data['w_photo']=$res;
include ('../../demo/DB.class.php');
$db=new DB();
$aaa= $db->insert('woke',$data);
if ($aaa) {
echo "添加成功";
header("refresh:2;url=wokelist.php");
exit();
}else{
echo "添加失败";
header("refresh:2;url=woke.php");
exit();
}




