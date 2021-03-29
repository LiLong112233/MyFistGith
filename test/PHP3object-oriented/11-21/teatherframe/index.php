<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/19
 * Time: 9:49
 */

header("content-type:text/html;charset=utf8");//设置编码


define('FRAME',realpath('./'));//当前位置的绝对路径
define('APP',FRAME.'\application');//应用目录
define('CONFIG',FRAME.'\config');//配置文件目录
define('CORE',FRAME.'\core');//核心文件目录
define('COMMON',FRAME.'\common');//公共函数目录


include ("./core/core.php");

\core\core::run();
