<?php 
$g_name=$_POST['g_name'];
$g_price=$_POST['g_price'];
$g_desc=$_POST['g_desc'];
$is_sale=empty($_POST['is_sale'])?'':$_POST['is_sale'];
$b_id=$_POST['b_id'];
$g_photo= $_FILES['g_img'];
// print_r($g_photo);
if (empty($g_price)) {
	echo "商品价格不能为空";
}
if (empty($g_desc)) {
	echo "商品描述不能为空";
}

   $img= $g_photo['name'];
   $str=strrpos($img,'.');
   $sub=substr($img,$str);
   $new_name='./img/'.time().rand(1000,9999).$sub;
   $res=move_uploaded_file($g_photo['tmp_name'],$new_name );
if (!$res) {
	exit("文件上传失败");
}
$link=mysqli_connect('127.0.0.1','root','123456','company');
$sql="insert into goods (g_name,g_price,g_desc,g_photo,is_sale,b_id)values('$g_name','$g_price','$g_desc','$new_name','$is_sale','$b_id') ";
$query=mysqli_query($link,$sql);
if ($query) {
	echo "添加成功";
	header("refresh:2;url=goodslist.php");
}else{
	echo "添加失败";
}






 ?>