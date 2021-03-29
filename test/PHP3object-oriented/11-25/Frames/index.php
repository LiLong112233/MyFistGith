<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/20
 * Time: 9:07
 */
   header("content-type:text/html;charset=utf8");

   define("FRAME",realpath('./'));//获取当前目录的绝对路径
   define("APP",FRAME.'\application');//获取应用目录
   define("CONFIG",FRAME.'\config');//获取配置文件
   define("COMMON",FRAME.'\common');//获取公共的函数目录
   define("CORE",FRAME.'\core');

    session_start();
   include("./core/core.php");

   \core\Core::run();

