<?php 

echo "欢迎光临";
//realapth('./')获取文件入口您的绝对路径
define('FRAME', realpath('./') );
echo FRAME;
define('INDEX',FRAME.'\index');
define('CONFIG',FRAME.'\config');
define('COMMON',FRAME.'\common');
define('ADMIN',FRAME.'\admin');
echo COMMON;

 ?>
