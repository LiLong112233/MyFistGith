<?php 

// class danli{
 
// private static $into; 

// private function __construct(){
// 	echo "单例";
// }
// public static function instance(){
// if (!empty(self::$into)) {
// 	return self::$into;
// }else{
// 	self::$into=new danli();
// 	return self::$into;
// }


// }
// private function __clone(){

// }
// }


















class aaa{
//2定义一个私有静态属性
private static $into;
//1将构造方法私有化，防止了类的实例化
private function __construct(){
	echo "单例";
}
//3定义一个私有静态方法来】通过if判断来实现单次实例
public static function objk(){
	if (!empty(self::$into)) {
	 return self::$into;
	}else{
	 self::$into = new aaa();
	 return self::$into;
	}
}

//定义一个私有克隆；来禁止用户克隆对象
private function __clone(){

}









}














































 ?>