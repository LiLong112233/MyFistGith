<?php 

namespace core;
 
class core{
protected static $confle;



//核心方法
public static function run(){
//1加载函数

include(CORE.'\common.php');
include(COMMON.'\common.php');
// echo sum(10,20);


// dump('sss');
// dump(['aaa'=>'vvv']);
//2加载配置
   self::$config = include(CONFIG.'\config.php'); 
 // dump($config);

//3错误提示
if (self::$config['app_debug']) {
  ini_set('display_errors','on');
  ini_set('error_reporting', E_ALL );
}else{
	ini_set('display_errors', 'off');
}

//4加载类库
spl_autoload_register('self::loadClass');
$aa= new \app\index\model\User();
$aa->insert();


//5路由处理
 // dump($_SERVER);
$path= $_SERVER['REQUEST_URI'];
 // echo $path;
$path=ltrim($path,'/');
// echo $path;
$arr=explode('/', $path);
// print_r($arr); 
if (!empty($arr[1])) {
	self::$moduel=$arr['1'];
self::$controller=$arr['2'];  
self::$action=$arr['3'];
}else{
	self::$moduel=self::$config['define_module'];
self::$controller= self::$config['define_controller'];  
self::$action= self::$config['define_action'];
}
 

$info='app'.'\\'.$moduel.'\\'.'controller'.'\\'.$controller;
$obj=new $info;
$obj->$action();



}
public static function loadClass($name){
	// echo $name;
	$name = str_replace('app', 'application', $name);
	// echo $name;
   $filename=$name.'.php';
    if (file_exists($filename)) {
     include $filename;
     }else{
     echo "该类不存在";
     }
    


}





}
 
 ?>