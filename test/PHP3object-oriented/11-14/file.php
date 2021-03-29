<?php 
class file{
	public $error ;
    public $size;    
    public $type;
    public $dir;         
   public function move($img){
    if ($img['error']==1||$img['error']==2) {
    	$this->error="文件过大";
    	return false;
    }else if ($img['error']==3) {
    	$this->error="文件部分上传";
    	return false;
    }else if ($img['error']==4) {
    	$this->error="文件未被上传";
    	return false;
    }
     
    if ($this->size*1024*1024<$img['size']) {
     	$this->error="文件大小大于".$this->size."mb";
     } 
   $str=substr($img['type'], strrpos($img['type'], '/')+1);
   if (!in_array($str,$this->type)) {
   $this->error="文件格式错误";
   return false;
   }

    $dir=date("Y").'/'.date('m').'/'.date('d');
    if (!empty($this->dir)) {
       $dir=$this->dir.'/'.$dir;
       }   
     if (!is_dir($dir)) {
     	mkdir($dir,'0777',turn);
     }
      $sub=substr($img['name'], strrpos($img['type'],'.') );
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