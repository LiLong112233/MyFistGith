<?php 

trait  moke{
public  function color(){
  	 
echo "猫科动物";
 }

};
trait eyes{
public function eyes(){
	echo "眼睛可以穿过夜色";
} 
};

trait run{
	public function run(){
		echo "跑的快";
	}
};
 
 class cat{
     use moke,eyes,run;
 };
 $cat = new cat();
 $cat->color();
 $cat->eyes();
 $cat->run();




 

// class aaa{
// 	public function aaa(){
// 		echo 'aaa';
// 	}

// 	}
// class bbb extends aaa {

// public function aaa(){
// 	echo "bbb";
// }
// }

// $bbb=new bbb();
// $bbb->aaa();




 ?>