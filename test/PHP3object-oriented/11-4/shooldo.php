<?php 
$s_name=$_POST['s_name'];
$s_img=$_FILES['s_img'];
// print_r($s_img);
$s_desc=$_POST['s_desc'];
$z_id=$_POST['z_id'];
$jianxiao=$_POST['year']."年".$_POST['mouth']."月".$_POST['day']."日";
 // echo $jianxiao;
 $name=$s_img['name'];
$str=strrpos($name, '.');
$sub=substr($name, $str);
$new_name='./img/'.time().rand(1000,9999).$sub;
// echo "$new_name";
$res=move_uploaded_file($s_img['tmp_name'],$new_name);
if (!$res) {
	echo "文件上传失败";
}
$link=mysqli_connect('127.0.0.1','root','123456','student');
$sql="insert into school (s_name,s_img,s_desc,z_id,jianxiao) values('$s_name','$new_name','$s_desc','$z_id','$jianxiao')";
echo "$sql";
$query=mysqli_query($link,$sql);
if ($query) {
	echo "添加成功";
	header("refresh:2;url=schoollist.php");
}








 ?>
