<?php 
$img=$_FILES['img'];
print_r($img);
include ('todo.class.php');
$file = new File();
$file->size=6;//单位MB
$file->type=['jpeg','jpg','png','gif'];
$file->dir='ing';

$res=$file->move($img);

if ($res==false) {
	echo $file->error;
}
echo $res;
 ?>