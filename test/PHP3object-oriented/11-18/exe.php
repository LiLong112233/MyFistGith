<?php  
class Exe{
//创建一个私有的静态属性；
 private static $info;
 public static $aaa;
//将构造方法设为私有化可以报错 防止用户实例化对象；
private function __construct(){
	echo "开始";
}
//	
public static function instance(){
  //限制对象输出1次
   //instanceof判断一个对象是否是这个类实例的；
        // if(self::$info instanceof Exe ){
        //    return self::$info;
        // }else{
        //    self::$info=new self();
        //    return self::$info;
        // }



  if (!empty(self::$info)) {
  	 return self::$info;
   	self::$aaa="壮壮";
  	 return self::$aaa;
  	}else{
  	 self::$info=new self();
  	  self::$aaa="壮壮";
  	 return self::$info;
  	}
  echo "打印";

}
//将克隆魔术方法设为私有可防止用户clone对象
private function __clone(){
}




}

// $obj=Exe::instance();
$ojb=Exe::instance();
var_dump($ojb);
echo Exe::$aaa;


?>

