<?php
/**
 * Created by PhpStorm.
 * User: 27341
 * Date: 2020/11/20
 * Time: 10:40
 */
namespace core;

class core{
    public static function run()
    {

        //1.加载函数
        include(CORE . "\common.php");//必须使用绝对路径 这个是框架中的函数文件
        include(COMMON . '\common.php');//我们自定义的函数文件


    }
}

