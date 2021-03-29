<?php 
class Job{
 public $name="壮壮";
 const  Age =18;
 public static $sex="男";
 public  function man(){
 	echo $this->name;
 	echo self :: Age;
 	echo self :: $sex;  
 }
}
// $job=new Job();
// // echo $job->name;
// // echo  Job::$sex;
// // $job->man();

// class aaa extends Job{
// public function  man(){
// 	Parent :: man();
// 	echo "习大大";
// }
// }
// class bbb extends Job {
// public   function man (){
// 		Parent :: man();
// 		echo "胡图图";
// 	}
// }
// $aaa=new aaa();
// $bbb=new bbb();
// // $aaa->man();
// $aaa -> man()  ;
// $bbb -> man();
class end{
	public function __construct(){
		echo "构造方法,当实例化对象时自动调用";
	}
   public function __set($name,$valus) {
   	echo "当你给一个不存在的或权限不够的属性".$name."赋值".$valus."时调用";
   }
   public function __get($name){
   	echo "当你调取不存在或权限不够的属性".$name."时调用";
   }
   public function __call($name,$arguments){
   	echo "当你调用一个不存在或权限不够的方法".$name."时调用";
   }
   public function __unset($name){
   	echo "当你销毁一个不存在或权限不够的属性".$name."时调用";
   }
   public function __isset($name){
   	echo "当你用isset判断一个不存在或权限不够的属性".$name."时调用";
   }
   public function __toString(){
   	 return '你正在用echo打印输出一个对象';
   }
  public function __clone(){
  	echo "当你克隆一个对象时调用";
  }




   public function __destruct(){
   	echo "析构方法，当对象被销毁时或运行结束时自动调用";
   }

}

spl_autoload_call('auto');
function auto ($classname){
	$filename=$classname.'.class.php';
	$path ="./one/".$filename;
	if (file_exists($path)) {
	  include $path;
	}else{
	  echo "您要加载的类文件".$filename."不存在";
	  
	}
}













 ?>