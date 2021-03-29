<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/19
 * Time: 10:10
 */
namespace core;
class core{

    protected static $config;
    protected static $module;
    protected static $controller;
    protected static $action;
    //核心方法
    public static function run(){

        //1.加载函数
   include (CORE."\common.php");//必须使用绝对路径 这个是框架中的函数文件
   include(COMMON.'\common.php');//我们自定义的函数文件

//   echo sum(10,20);
////    dump("sss");
////    dump(['aaa'=>123]);
        //2.加载配置
       self::$config= include (CONFIG.'\config.php');//引入配置文件
        //3.错误提示
       if (self::$config['app_debug']){
          ini_set('display_errors','on');
//          ini_set('error_reporting',E_ALL);
       }else{
           ini_set('display_errors','off');
       }
        //4加载类库
        spl_autoload_register("self::loadClass");
//        $aa =new \app\index\model\User();
//        $aa->insert();

        //5 路由处理。。 (需要的是 要知道哪个模块，哪个控制器，哪个方法）
//        dump($_SERVER);
         $path = $_SERVER['REQUEST_URI'];
//          echo $path;
        $path = ltrim($path,'/');
//        echo $path;
        //转为数组
        $arr = explode('/',$path);
         if (!empty($arr[1])){
             self::$module = $arr[1];//获取模块名
             self::$controller = $arr[2];//获取控制器
             self::$action = $arr[3];//获取方法
         }else{
             self::$module = self::$config['default_module'];//获取模块名
             self::$controller = self::$config['default_controller'];//获取控制器
             self::$action = self::$config['default_action'];//获取方法
         }

        $action = self::$action;
        $info = 'app'.'\\'.self::$module.'\\'.'controller'.'\\'.self::$controller;
//        dump($info);
        $obj= new $info;
        $obj->$action();


    }

    public static function loadClass($name){
//       echo $name;
        $name = str_replace('app','application',$name);
//        echo $name;
        $filename =$name.'.php';
        if (file_exists($filename)){
            include $filename;
        }else{
            echo "类库不存在";
        }
    }



}
