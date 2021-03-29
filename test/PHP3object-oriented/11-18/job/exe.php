<?php 
//抽象类用abstract开头；
abstract class Animal{
	//抽象类内可以有抽象方法和普通方法
 public function dog(){
 	echo "汪汪汪";
 }
 //抽象方法也用abstract开头只有方法名没有方法体；
 abstract function pig();
}


class aaa extends Animal{
	public function dog(){
		parent::dog();
	}
//继承的抽象方法也要实现
public function pig(){

}

}
$aaa=new aaa();
$aaa->dog();
/****  接口 ******/
//接口用 interface 来定义；
interface aa{
	//接口内只可以有抽象方法 但是不需要写abstract；
	public function bbb();
}
//接口用extends 来继承了；
interface sss extends aa {
	public function ddd();
}
//解口用implements 来实现一个或多个接口；
class man implements sss{
	public function bbb(){}
	public function ddd(){}
}


/*****单例****/

class Person{
//3创造一个私有静态属性
private static $into;

//1构造方法私有化进制 禁止实例化；
 private function __construct(){
 	echo "单例";
 }
//2对外提供出口；
public static function instance(){
// if (!empty(self::$into)) {
// 	return self::$into;
// }else{
// 	self::$info=new Person();
// 	return self::$into;
// }
// } 
	if (self::$into instanceof Person) {
	return self::$into;
}else{
	self::$into=new Person();
	return self::$into;
}
} 
//4私有clone；防止克隆
private function __clone(){
}
}
$objkt=Person::instance();
var_dump($objkt);














 ?>