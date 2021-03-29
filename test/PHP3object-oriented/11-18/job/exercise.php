<?php 
abstract class Man{
	public function run(){
		echo "两条腿跑的不慢呢";
	}
    abstract function sleep();
    }
    class pig extends Man {
    	public function run(){
    		parent::run();
    	}
    	public function sleep(){

    	}
    }
  $pig =new pig();
  $pig->run();
 /********* 接口 **********/
interface name{
	public function pig();
}
interface user extends name{
	public function dog();
}
class aaa implements user{
	public function pig(){}
	public function dog(){}
}

/*********单例*********/
class Person{

private static $into;
 
private  function __construct(){
	echo "单例";
}
public static function instance(){
	if (!empty(self::$into)) {
		return self::$into;
	}else{
		self::$into=new Person();
		return self::$into;
	}
}
 private function __clone(){
 }
}
$objk=Person::instance();
var_dump($objk);











 ?>