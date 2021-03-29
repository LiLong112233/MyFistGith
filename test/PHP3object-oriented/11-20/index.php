<?php
/**
 * Created by PhpStorm.
 * User: 27341
 * Date: 2020/11/20
 * Time: 10:23
 */
header("content-type:text/html;charset=utf8");
define('FRAME',realpath('./'));
//echo FRAME;
define('APP',FRAME.'\application');
define('CONFIG',FRAME.'\config');
define('CORE',FRAME.'\core');
define('COMMON',FRAME.'\common');

//include ("./core/core.php");
//
//\core\core::rum();