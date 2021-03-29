<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/18
 * Time: 14:49
 */


  //入口文件
//echo realpath('./');//获取入口文件的绝对路径
define('FRAME',realpath('./'));
define('INDEX',FRAME.'\index');
define('CONFIG',FRAME.'\config');
define('COMMON',FRAME.'\common');
define('ADMIN',FRAME.'\admin');

echo ADMIN.'<br>';
echo CONFIG;
//define('CORE','../'.FRAME.'\core');
//echo CORE;
echo "框架课程开始了，都打起精神来好好学";
