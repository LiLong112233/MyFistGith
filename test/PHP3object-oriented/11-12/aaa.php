<?php 
$img=$_FILES['img'];
include('aaado.php');
$file=new file();
$file->size=1;//限制文件大小单位MB
$file->type=['jpeg','jpg','png','gif'];//限制文件类型
$file->dir='img';//文件上传之后所储存的文件夹名称
$res= $file->move($img);
if ($res==false) {
 echo $file->error;
}
echo $res;

 ?>