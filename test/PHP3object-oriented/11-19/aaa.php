<?php 
abstract class A{
public function run(){
	echo "aasdadadaf";
}
abstract function sleep();
}
class B extends A {
	public function run(){
		parent::run();
	}
	public function sleep(){

	}
}
$C=new B();
$C->run();

/**************************/

class D {

private static $E;

private function __construct(){
	echo "asad";
}
public static function F(){
	// if (!empty(self::$E)) {
	// return self::$E;
	// }else{
	//  self::$E=new D();
	//  return self::$E;
	// }
	if (self::$E instanceof D ) {
	return self::$E;
	}else{
	 self::$E=new D();
	 return self::$E;
	}
} 
private function __clone(){

}
}
$G=D::F();
var_dump($G);











 ?>