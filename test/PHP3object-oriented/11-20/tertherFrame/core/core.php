<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/20
 * Time: 9:09
 */

namespace core;

class Core{

    protected static $config;
    protected static $module;
    protected static $controller;
    protected static $action;
    static public function run(){

        //1.加载函数
        include (CORE.'\common.php');//核心函数
        include(COMMON.'\common.php');//自定义函数

//        dump("sss");
//        echo chengfa(2,3);
        //2.加载配置
         self::$config = include(CONFIG.'\config.php');
//         dump(self::$config);
        //3.错误提示
         if (self::$config['app_debug']){
             ini_set('display_errors','on');
         }else{
             ini_set("display_errors",'off');
         }

        //4.加载类库
        spl_autoload_register("self::loadClass");

        //5.路由处理
        self::handleRoute();

        $action = self::$action;
        $path = 'app'.'\\'.self::$module.'\\'.'controller'.'\\'.self::$controller;
        $obj = new $path;
        $obj->$action();



    }

    //路由处理静态方法
    public static function handleRoute(){
        $str = $_SERVER['REQUEST_URI'];
        $str = ltrim($str,'/');
        $arr = explode('/',$str);
        if (!empty($arr[1])){
            self::$module = $arr[1];
            self::$controller = $arr[2];
            self::$action = $arr[3];
        }else{
            self::$module=self::$config['default_moudle'];
            self::$controller= self::$config['default_controller'];
            self::$action = self::$config['default_action'];
        }
    }

    //处理实例化使用自动加载的静态方法
    public static function loadClass($name){
        $name = str_replace('app','application',$name);
        $fileName = $name.'.php';
        if (file_exists($fileName)){
            include $fileName;
        }else{
            echo "该类库不存在";
        }
    }
}
















