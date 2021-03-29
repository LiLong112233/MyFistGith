<?php 
class Farther{
	 private $name="刘备";
	public $money="300万";
	public $home="碧桂园房产2套";
     private $wife="孙尚香";
     public $car="汗血宝马";
     public function wisdom(){
     	echo "IQ：110";
     }

}


class Son extends Farther{
	public function wisdom(){
		Parent :: wisdom();
		echo "有很深的智慧但并不展露";
	}
}
$son=new Son();
print_r($son);

$son->wisdom();


















 ?>