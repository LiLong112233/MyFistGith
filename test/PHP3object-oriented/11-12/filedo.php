<?php 
$img=$_FILES['img'];

include ('File.class.php');
$file=new File();
$file->size=6;//单位为mb
$file->type= ['jpeg','jpg','gif','png'];
$file->dir="img";
  $res= $file->move($img);
  
  if ($res==false) {
  	echo $file->File_name;
  }
  echo $res;
 ?>