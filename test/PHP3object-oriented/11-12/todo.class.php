<?php 
class File{
public $error;
public $size;
public $type;
public $dir;
public function move($img){
  if ($img['error']==1||$img['error']==2) {
  	$this->error="所上传文件过大";
  	return false;
  }
  if ($img['error']==3) {
  	$this->error="文件被部分上传";
  	return false;
 }
  if ($img['error']==4) {
    $this->error="文件未上传";
    return false;
  }
  if ($img['size']>$this->size*1024*1024) {
  	 $this->error="该文件大于". $this->size."MB";
  	 return false;
  }

$aaa=substr($img['type'],strrpos($img['type'],'/')+1 );
// echo $aaa;
   if (!in_array($aaa,$this->type)) {
  	$this->error="文件格式错误";
  	return false;
  }
$dir=date('Y').'/'.date('m').'/'.date('d');

if (!empty($this->dir)) {
  $dir=$this->dir.'/'.$dir;
}
// echo $dir;
 if (!is_dir($dir)) {
   mkdir($dir,'0777',true);
 }


$sub=substr($img['name'],strrpos($img['name'], '.'));
$new_name=$dir.'/'.time().rand(1000,9999).$sub;
$res=move_uploaded_file($img['tmp_name'],$new_name);
if ($res) {
	return $new_name;
}else{
	return false;
}



  }
 }










  ?>