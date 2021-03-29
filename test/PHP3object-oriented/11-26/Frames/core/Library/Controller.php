<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/20
 * Time: 11:23
 */
namespace core\Library;

class Controller{

    protected $data;
    public function __construct()
    {
    }

    /** 操作成功的跳转方法
     * @param $str  提示语
     * @param $url  跳转路径
     */
    public function success($str,$url){
        echo "<b>$str</b>";
        header("refresh:2;url='$url'");
        exit;
    }

    /**操作失败的方法
     * @param $str 提示语
     * @param $url 跳转url
     */
    public function error($str,$url=''){
        echo "<font color='red'>$str</font>";
        if (!empty($url)){
            header("refresh:2;url='$url'");
        }else{
            echo "<script>setTimeout('history.go(-1)',2000)</script>";
        }
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
          include $path;
    }

}