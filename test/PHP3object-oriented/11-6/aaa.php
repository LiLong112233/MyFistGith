<?php 

class AAA{
	public $name="汤姆";
	private $sex=18;
	// public function __construct($name){
	// 	echo "开始".$name;
	// }
	// public function __destruct(){
	// 	echo "结束";
	// }
    public function __set($me,$value){
    	echo "未定义".$me.$value;
    }
    public function __get($na){
    	echo "不可调用".$na;
    }
    public function __call($name,$arr ){
    	echo "不存在的".$name;
    	print_r($arr);
    }
    public function __unset($name){
       echo "销毁了一个属性，而他不存在或你没有权限";
    }
    public function __isset($name){
    	echo "你正在判断一个没有权限或没有定义的属性";
    }
    public function __toString(){
    	echo "您正在用echo输出对象";

    }
    public function __clone(){
    	echo "克隆中";
    }
}   
$aa=new AAA();
// echo $aa->name;
// $aa->run()
// unset($aa->age);
// unset($aa->sex)

// echo $aa->age;
// $aa->sex=18;
// echo $aa->sex;
// isset($aa->sex);
// isset($aa->age)
// echo $aa;




class zzz{
  public $name="嘻嘻嘻哈哈哈";

}


$bbb = clone $aa;
 $bbb->name="杰克";
echo $bbb->name;







 ?>