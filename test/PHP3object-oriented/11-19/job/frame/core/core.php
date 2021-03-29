<?php 
namespace core;
class core {
  protected static $config;
    protected static $module;
    protected static $controller;
    protected static $action;
    //核心方法
public  static  function run(){

include(CORE.'\common.php');
include(COMMON.'\common.php');
// dump('sss');
// echo sum(10,20);
self::$config=include(CONFIG.'\config.php');
 if (self:: $config['app_debug']) {
  ini_set('display_error','on');
  ini_set('error_reporting',E_ALL);
 }else{
 	ini_set('display_error','off');
 }
spl_autoload_register('self::loadClass');
// / $aa=new \app\index\controllar\User();

$path=$_SERVER['REQUEST_URI'];

 $path=ltrim($path,'/');

 $arr = explode('/', $path);
if (!empty($arr[1])) {
	   self::$module = $arr[1];//获取模块名
             self::$controller = $arr[2];//获取控制器
             self::$action = $arr[3];//获取方法
}else{
	 self::$module = self::$config['default_module'];//获取模块名
             self::$controller = self::$config['default_controller'];//获取控制器
             self::$action = self::$config['default_action'];//获取方法
}
$action=self::$action;
$info ='app'.'\\'.self::$module.'\\'.'controller'.'\\'.self::$controller;
echo $info;
$obj=new $info;
$obj->$action();





}
public static function loadClass($name){
	// echo $name;
$name =str_replace('aaa', 'application', $name);

$filename=$name.'.php';
if (file_exists($filename)) {
	include $filename;
}else{
   echo "类库不存在";
}
}














}










 ?>