<?php
/**
 * Created by PhpStorm.
 * User: 27341
 * Date: 2020/11/20
 * Time: 15:32
 */
namespace core\Library;

class  Controller{
    public function __construct()
    {
//   echo" 这是一个基类";
    }
    public function sueccess($the,$url){
        echo $the;
        header("refresh:2;url='$url'");
        exit();
    }
   public function  error($str,$error){
        echo "<font color='red'>$str</font>";
//        header("refresh:2;url='$error'");
        echo "<script>setTimeout( history.go(-1),2000);</script>";
        exit;
   }




}
