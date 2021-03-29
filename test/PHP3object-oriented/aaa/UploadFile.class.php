<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/12
 * Time: 9:00
 */

   class UploadFile{

       public $error;//错误属性
       public $size;//大小属性
       public $type;//文件类型
       public $dir;//文件名

       public function move($file){

           //验证错误
           if ($file['error']==1 || $file['error']==2){
               $this->error =  "上传文件过大";
               return false;
           }else if($file['error']==3){
               $this->error= "文件部分上传";
               return false;
           }else if($file['error']==4){
              $this->error = "文件未上传";
               return false;
           }

           //文件大小
           if (!empty($this->size)){
               $size = $this->size * 1024*1024;//转为字节数
               if ($file['size']>$size){
                   $this->error="上传文件不能超过".$this->size."M";
                   return false;
               }
           }

           //类型
            $file_type = $file['type'];// image/png
           //获取后缀名
           $houzhui = substr($file_type,strrpos($file_type,'/')+1);
           if (!in_array($houzhui,$this->type)){
               $this->error= "上传文件类型有误";
               return false;
           }

           //文件夹的处理
           $dir = date("Y").'/'.date('m').'/'.date('d');
           if (!empty($this->dir)){
               $dir = $this->dir.'/'.$dir;
           }
           //is_dir（）是检测是否是文件夹
           if (!is_dir($dir)){
               mkdir($dir,'0777',true);
           }
           //上传
           $file_name = $file['name'];
           $file_hz = substr($file_name,strrpos($file_name,'.'));
           $new_path = $dir.'/'.time().rand(1000,9999).$file_hz;
            // echo $new_path;
          $res = move_uploaded_file($file['tmp_name'],$new_path);
           if($res){
               return $new_path;
           }else{
               return false;
           }
       }
   }