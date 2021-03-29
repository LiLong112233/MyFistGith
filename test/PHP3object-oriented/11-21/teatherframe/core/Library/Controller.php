<?php
/**
 * Created by PhpStorm.
 * User: 27341
 * Date: 2020/11/20
 * Time: 15:32
 */
namespace core\Library;

class  Controller{
    protected  $data;
    public function __construct()
    {
//   echo" 这是一个基类";
    }
    public function success($the,$url){
        echo $the;
        header("refresh:2;url='$url'");
        exit();
    }
   public function  error($str,$error){
        echo "<font color='red'>$str</font>";
//        header("refresh:2;url='$error'");
        echo "<script>setTimeout( 'history.go(-1)',2000);</script>";
        exit;
   }
    public function assign($str,$data){
        $this->data[$str] = $data;//变为三维数组

//        dump($this->data);
    }
    public function display($view=''){
        if (!empty($this->data)){
            extract($this->data);//此函数的作业是将数组中的键名也就key转为变量，而数组中的键值转为变量的值
        }

        $moudle = MOUDLE;
        $controller = CONTROLLER;
        $controller = strtolower($controller);
        if (empty($view)){
            $view = ACTION;
        }
        $path = APP.'\\'.$moudle.'\view'.'\\'.$controller.'\\'.$view.'.html';
        dump($path);
        include $path;
    }




}
