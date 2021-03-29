<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/19
 * Time: 10:10
 */
namespace core;
class core{

    //核心方法
    public static function run(){

        //1.加载函数
   include (CORE."\common.php");//必须使用绝对路径 这个是框架中的函数文件
   include(COMMON.'\common.php');//我们自定义的函数文件

//   echo sum(10,20);
//    dump("sss");
//    dump(['aaa'=>123]);
        //2.加载配置
       $config= include (CONFIG.'\config.php');//引入配置文件
//       dump($config);
        //3.错误提示
       if ($config['app_debug']){
          ini_set('display_errors','on');
          ini_set('error_reporting',E_ALL);
       }else{
           ini_set('display_errors','off');
       }
        //4加载类库


        //5 路由处理。。
    }


}