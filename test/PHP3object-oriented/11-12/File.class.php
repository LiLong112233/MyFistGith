<?php 

   class File{
   
   public $File_name;
    public $size;
    public $type;
    public $dir;
   public function move($img){
      
   if ($img['error']==1||$img['error']==2) {
   	$this->File_name="文件过大上传失败";
   	return false;
   }else if ($img['error']==3) {
   	$this->File_name="文件部分被上传";
   	return false;
   }else if ($img['error']==4) {
   	$this->File_name="文件未被上传";
   	return false;
   }   

   if (!empty($this->size)) {
    // echo $this->size;
    $size=$this->size*1024*1024;
     if ($img['size']>$size) {
      $this->File_name="当前文件大于".$this->size."MB";
      return false ;
   }
   }
  
   
 
  $aaa=substr($img['type'],strrpos($img['type'],'/')+1);
  // echo $aaa;    

   if (!in_array($aaa,$this->type)) {
   	$this->File_name="文件类型错误必须为".print_r($this->type)." 文件格式";
   	return false;
   }

   $dir= date("Y").'/'.date('m').'/'.date('d');
   if (!empty($this->dir)) {
     $dir=$this->dir.'/'.$dir;
   }
   if (!is_dir($dir)) {
     mkdir($dir,'0777',true);
   }
  

   
   $sub=substr($img['name'], strrpos($img['type'],'.') );
   // echo $sub;exit;
   $new_name=$dir.'/'.time().rand(1000,9999).$sub;
   // echo $new_name;
   $res=move_uploaded_file($img['tmp_name'],$new_name);
    if ($res) {
   return $new_name;      
    }else{
      return false;
    }




   } 



}










 ?>