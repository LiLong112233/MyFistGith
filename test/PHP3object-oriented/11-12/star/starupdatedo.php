<?php 
$data=$_POST;
// print_r($data);
$file=$_FILES['s_img'];
if ($file['error']==0) {
include ('../../demo/UploadFile.class.php');
$UploadFile=new UploadFile();

$UploadFile->size=6;
$UploadFile->type=['jpeg','jpg','png'];
$UploadFile->dir='img';
$res=$UploadFile->move=$file;
$data['file']=$res;
};

$where=[['id','=',$data['id']]];


print_r($data);
include('../../demo/DB.class.php');

$db=new DB();
$res=$db->where($where)->update('stat',$data);

echo $res;
if ($res) {
	echo "修改成功";
	header("refresh:2;url=statlist.php");
	exit;
}else{
	echo "修改失败";
}

 ?>