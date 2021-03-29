<?php 
class job {
	public $name ="顾生壮";
	public function abc(){
    echo "他会说abc";
	}
	public function run(){
		echo "跑得快";
		$this->abc();
		echo $this->name;//this是对象的伪类对象只能用于普通的属性方法;
        
	}
     // public function __construct(){
     // 	echo "开始";
     // } 
     // public function __destruct(){
     // 	echo "结束";
     // }
     // public static $sex=18;
 //    public static function cba(){
 //    	echo "他还会说cba";
 //    }
	// public static function ect(){	
 //    echo "吃的多";
 //    self::cba();
 //    echo  self :: $sex ;//self是用来引入静态成员与方法；
	// }
  //  public function __set($aaa,$value){
  //  	echo "你正在给一个不存在或权限不够的属性赋值".$aaa."赋值为".$value0;
  //  }
  //  public function __get($bbb){
  //  	echo "你正在调用一个不存在或者权限不够的属性";
  //  }
  //  public function __call($ccc,$arr){
  //  	echo "你正在调用一个不存在或权限不够的方法";
  //  }
  // public function __unset($ddd){
  // 	echo "你正在销毁一个不存在或者权限不够的属性";
  // }
  // public function __isset($eee){
  // 	echo "你正在使用isset函数判断一个不存在或者权限不够的属性";
  // }
  // public function __toString(){
  // 	echo "您正在使用echo输出一个对象";
  // }
  // public function __clone(){
  // 	echo "该对象已被克隆";
  // }


}   spl_autoload_register('auto');
   function auto ($name){
   	$filename=$name.'.class.php';
   	$pate ="./one/".$filename;
   	if (file_exists($pate)) {
   	include ($pate);
   	}else{
   	echo "您要加载的文件不存在";
   	}
   }
$job=new job();
$D=new a();
echo $D->name;
// $woke= clone $job;


// echo $job;
// echo $job->name;
// $job->run();

// // echo job :: $sex;
// job :: ect ();

    //  class son extends job{
    // public static function ect(){
    // 	Parent :: ect();
    // 	echo "吃的少";
    // }
   // }	
   // class abc extends job{

   //   public static function ect(){
   //   	Parent :: ect();
   //   	echo "爱吃肉";
   //   }
   // }

    //  $son= new son();
    // // var_dump($son);
    //  son :: ect();

    //  abc :: ect();



 ?>