<?php 
//抽象类用abstract定义；
//抽象类不能进行实例化，只能被继承，抽象类  类内可以有普通方法，也可以有抽象方法；；
abstract class Animal{
	public function sleep(){
		echo "睡得老香了";
	}
	//抽象方法只有方法名，没有方法体
	abstract function run();
}
class pig extends Animal{
	public function sleep(){
		parent::sleep();
	}
	//一个类继承了 抽象类，那么必须实现抽象类中的抽象方法
	public function run(){

	}
}
$pig=new pig();
$pig->sleep();


//(1)接口关键字interface
interface name{
	//接口里的方法必须全为抽象方法，但是不需要写abstract；
	public function xing();
}
//接口与接口之间可以被继承；用extends 来继承；
interface user extends name{
  public function ming();
}

//接口用implements来实现一个或多个接口；
class man implements user{
	public function ming(){	}
	public function xing(){}
}






 ?>